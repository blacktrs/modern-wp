<?php

declare(strict_types=1);

/**
 * Plugin Name: WP Password bcrypt
 * Plugin URI:  https://github.com/roots/wp-password-bcrypt
 * Description: Replaces wp_hash_password and wp_check_password with password_hash and password_verify.
 * Author:      Roots
 * Author URI:  https://roots.io
 * Version:     1.1.0
 * Licence:     MIT.
 */

/**
 * @author Roots.io
 * @author Taras Chornyi <taras.chr@gmail.com>
 *
 * @version 1.2.0
 *
 * Added strict typing to achieve compatability with the latest PHP versions
 */

/**
 * Determine if the plaintext password matches the encrypted password hash.
 *
 * If the password hash is not encrypted using the PASSWORD_DEFAULT (bcrypt)
 * algorithm, the password will be rehashed and updated once verified.
 *
 * @see https://www.php.net/manual/en/function.password-verify.php
 * @see https://www.php.net/manual/en/function.password-needs-rehash.php
 *
 * @param string   $password the password in plaintext
 * @param string   $hash     the hashed password to check against
 * @param int|null $userId   the optional user ID
 *
 * @SuppressWarnings(PHPMD.CamelCaseVariableName) $wp_hasher
 */
function wp_check_password(string $password, string $hash, int $userId = null): bool
{
    if (!password_needs_rehash($hash, \PASSWORD_DEFAULT, apply_filters('wp_hash_password_options', []))) {
        return (bool) apply_filters(
            'check_password',
            password_verify($password, $hash),
            $password,
            $hash,
            $userId
        );
    }

    global $wp_hasher;

    if (empty($wp_hasher)) {
        require_once ABSPATH.WPINC.'/class-phpass.php';
        $wp_hasher = new PasswordHash(8, true);
    }

    if (!empty($userId) && $wp_hasher->CheckPassword($password, $hash)) {
        $hash = wp_set_password($password, $userId);
    }

    return (bool) apply_filters('check_password', password_verify($password, $hash), $password, $hash, $userId);
}

/**
 * Hash the provided password using the PASSWORD_DEFAULT (bcrypt)
 * algorithm.
 *
 * @see https://www.php.net/manual/en/function.password-hash.php
 *
 * @param string $password the password in plain text
 */
function wp_hash_password(string $password): string
{
    return password_hash($password, \PASSWORD_DEFAULT, apply_filters('wp_hash_password_options', []));
}

/**
 * Hash and update the user's password.
 *
 * @param string $password the new user password in plaintext
 * @param int    $user_id  the user ID
 */
function wp_set_password(string $password, int $user_id): string
{
    $hash = wp_hash_password($password);
    $isApiRequest = apply_filters(
        'application_password_is_api_request',
        (\defined('XMLRPC_REQUEST') && XMLRPC_REQUEST)
        || (\defined('REST_REQUEST') && REST_REQUEST)
    );

    if (!$isApiRequest) {
        global $wpdb;

        $wpdb->update($wpdb->users, [
            'user_pass' => $hash,
            'user_activation_key' => '',
        ], ['ID' => $user_id]);

        clean_user_cache($user_id);

        return $hash;
    }

    if (
        !class_exists('WP_Application_Passwords')
        || empty($passwords = WP_Application_Passwords::get_user_application_passwords($user_id))
    ) {
        return '';
    }

    global $wp_hasher;

    if (empty($wp_hasher)) {
        require_once ABSPATH.WPINC.'/class-phpass.php';
        $wp_hasher = new PasswordHash(8, true);
    }

    foreach ($passwords as $key => $value) {
        if (!$wp_hasher->CheckPassword($password, $value['password'])) {
            continue;
        }

        $passwords[$key]['password'] = $hash;
    }

    update_user_meta(
        $user_id,
        WP_Application_Passwords::USERMETA_KEY_APPLICATION_PASSWORDS,
        $passwords
    );

    return $hash;
}

<?php

declare(strict_types=1);
/**
 * Plugin Name:  Register Application Config
 * Plugin URI:   https://github.com/tarchr/modern-wp
 * Description:  Set default configuration
 * Version:      1.0.0
 * Author:       Taras Chornyi
 * Author URI:   https://github.com/tarchr
 * License:      MIT License.
 */

use App\Kernel;

// Overwrite default WordPress theme directory
register_theme_directory(APP_WP_THEME_DIRECTORY);

// Fix $_SERVER['REQUEST_METHOD'] calls in CLI mode
add_action('wp', function () {
    if (\PHP_SAPI === 'cli') {
        $_SERVER['REQUEST_METHOD'] ??= null;
    }
});

$kernel = Kernel::getInstance();
$container = $kernel->getContainer();

// Change wp-json prefix
add_filter('rest_url_prefix', fn () => $container->getParameter('app.restPrefix'), \PHP_INT_MAX - 1000);

add_action('plugins_loaded', function () use ($container) {
    load_muplugin_textdomain(
        $container->getParameter('app.id'),
        $container->getParameter('kernel.project_dir').'/translations/'
    );
});
$kernel->dispatch();

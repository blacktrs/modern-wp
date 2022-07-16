<?php

declare(strict_types=1);
/**
 * Your base production configuration goes in this file. Environment-specific
 * overrides go in their respective config/packages/{WP_ENV}/*.yaml files.
 *
 * A good default policy is to deviate from the production config as little as
 * possible. Try to define as much of your configuration in this file as you
 * can.
 */

use function App\env;

use App\Kernel;
use Blacktrs\WPBundle\Loader\ConfigLoader;
use Symfony\Component\Dotenv\Dotenv;
use Symfony\Component\ErrorHandler\Debug;
use Symfony\Component\ErrorHandler\ErrorHandler;

/**
 * Directory containing all the site's files.
 *
 * @var string
 */
$rootDir = \dirname(__DIR__);

/**
 * Document Root.
 *
 * @var string
 */
$webRootDir = $rootDir.'/public';

$dotenv = new Dotenv('APP_ENV', 'WP_DEBUG');
$dotenv->loadEnv($rootDir.'/.env');

/*
 * Set up our global environment constant and load its config first
 * Default: production
 */
$wpEnvMap = [
    'dev' => 'development',
    'prod' => 'production',
];

\define('WP_ENV', $wpEnvMap[env('APP_ENV')] ?? env('APP_ENV') ?? 'production');

/*
 * Allow WordPress to detect HTTPS when used behind a reverse proxy or a load balancer
 * See https://codex.wordpress.org/Function_Reference/is_ssl#Notes
 */
if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
    $_SERVER['HTTPS'] = 'on';
}

if (\defined('WP_ADMIN') && WP_ADMIN) {
    ErrorHandler::register(new ErrorHandler(debug: true));
}

$kernel = new Kernel(env('APP_ENV'), filter_var(env('WP_DEBUG', false), \FILTER_VALIDATE_BOOL));
$kernel->boot();
/** @var \Symfony\Component\DependencyInjection\Container $container */
$container = $kernel->getContainer();

$kernel->registerHooks();

Kernel::setInstance($kernel);

$configLoader = new ConfigLoader($container->getParameterBag());
$configLoader->apply();

$table_prefix = env('DATABASE_PREFIX');

// Custom Content Directory
\define('CONTENT_DIR', '/app');
\define('WP_CONTENT_DIR', $webRootDir.\constant('CONTENT_DIR'));
\define('WP_CONTENT_URL', \constant('WP_HOME').\constant('CONTENT_DIR'));

// Register default theme and theme directory
\define('WP_DEFAULT_THEME', 'site-default');

$themeDir = $rootDir.CONTENT_DIR.'/themes/site-default';
\define('APP_WP_THEME_DIRECTORY', $themeDir);

// Bootstrap WordPress
if (!\defined('ABSPATH')) {
    \define('ABSPATH', $webRootDir.'/wp/');
}

if (\defined('WP_DEBUG') && WP_DEBUG) {
    Debug::enable();
}

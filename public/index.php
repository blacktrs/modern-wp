<?php

/**
 * WordPress View Bootstrapper.
 */
\define('WP_USE_THEMES', !(\PHP_SAPI === 'cli'));
require __DIR__.'/wp/wp-blog-header.php';

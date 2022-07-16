<?php

declare(strict_types=1);

add_action('after_setup_theme', function (): void {
    add_theme_support('menus');
});

<?php

declare(strict_types=1);

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class WpExtension extends AbstractExtension
{
    public function getFunctions(): array
    {
        return [
            new TwigFunction('wp_load_template', load_template(...)),
            new TwigFunction('wp_get_template_part', get_template_part(...)),
            new TwigFunction('wp_do_action', do_action(...)),
            new TwigFunction('wp_get_header', get_header(...)),
            new TwigFunction('wp_get_footer', get_footer(...)),
            new TwigFunction('wp_get_sidebar', get_sidebar(...)),
        ];
    }
}

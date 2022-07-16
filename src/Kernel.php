<?php

declare(strict_types=1);

namespace App;

use Blacktrs\WPBundle\Kernel\WPKernel;
use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;

class Kernel extends WPKernel
{
    use MicroKernelTrait;

    public function registerHooks(): void
    {
    }
}

<?php

declare(strict_types=1);

namespace App;

function env(string $key, mixed $default = null): mixed
{
    return $_ENV[$key] ?? $default;
}

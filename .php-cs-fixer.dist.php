<?php

use PhpCsFixer\Finder;

$finder = Finder::create()->in(
    [
        __DIR__ . '/src',
        __DIR__ . '/config',
        __DIR__ . '/public/app/mu-plugins',
        __DIR__ . '/public/app/themes/site-default'
    ]
);

return (new \PhpCsFixer\Config())
    ->setRiskyAllowed(true)
    ->setRules(
        [
            '@Symfony' => true,
            '@Symfony:risky' => true,
            '@PSR12' => true,
            'yoda_style' => false,
            'multiline_whitespace_before_semicolons' => false,
            'array_syntax' => ['syntax' => 'short'],
            'modernize_strpos' => true,
            'native_function_invocation' => true,
            'class_attributes_separation' => true,
            'group_import' => true,
            'single_import_per_statement' => false,
            'declare_strict_types' => true,
            'global_namespace_import' => [
                'import_functions' => true,
                'import_classes' => true,
            ],
            'no_unused_imports' => true,
        ]
    )
    ->setFinder($finder);

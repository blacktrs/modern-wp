<?php

declare(strict_types=1);

use Rector\CodeQuality\Rector\Class_\InlineConstructorDefaultToPropertyRector;
use Rector\Config\RectorConfig;
use Rector\Doctrine\Set\DoctrineSetList;
use Rector\Set\ValueObject\LevelSetList;
use Rector\Set\ValueObject\SetList;
use Rector\Symfony\Set\SymfonySetList;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->paths(
        [
            __DIR__ . '/src',
        ]
    );

    // register a single rule
    $rectorConfig->rule(InlineConstructorDefaultToPropertyRector::class);

    // define sets of rules
    $rectorConfig->sets(
        [
            LevelSetList::UP_TO_PHP_81,
            DoctrineSetList::ANNOTATIONS_TO_ATTRIBUTES,
            SymfonySetList::ANNOTATIONS_TO_ATTRIBUTES,
            SetList::CODE_QUALITY,
            SetList::CODING_STYLE,
            SetList::DEAD_CODE,
            SetList::NAMING,
            SetList::TYPE_DECLARATION_STRICT,
            SetList::PHP_81,
        ]
    );
};

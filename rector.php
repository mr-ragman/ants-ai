<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Php83\Rector\ClassMethod\AddOverrideAttributeToOverriddenMethodsRector;
use Rector\TypeDeclaration\Rector\Property\TypedPropertyFromStrictConstructorRector;
use Rector\TypeDeclaration\Rector\StmtsAwareInterface\DeclareStrictTypesRector;

return RectorConfig::configure()
    ->withPaths([
        __DIR__.'/src',
        __DIR__.'/tests',
    ])
    ->withRules([
        // AddOverrideAttributeToOverriddenMethodsRector::class, # 8.3
        TypedPropertyFromStrictConstructorRector::class,
        DeclareStrictTypesRector::class,
    ])
    // uncomment to reach your current PHP version
    // ->withPhpSets()
    ->withPreparedSets(
        deadCode: true,
        codeQuality: true,
        privatization: true,
        earlyReturn: true,
        codingStyle: true,
    )
    ->withTypeCoverageLevel(0)
    ->withImportNames(removeUnusedImports: true); // typeDeclarations:true

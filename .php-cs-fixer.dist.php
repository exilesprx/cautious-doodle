<?php

$finder = (new PhpCsFixer\Finder())
    ->in(__DIR__)
;

return (new PhpCsFixer\Config())
    ->setRules([
        '@PSR12' => true,
        'ordered_imports' => true,
    'annotations' => ['use' => 'none'],
        'array_syntax' => ['syntax' => 'short'],
    ])
    ->setFinder($finder)
;

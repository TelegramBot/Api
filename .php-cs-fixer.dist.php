<?php

$finder = \PhpCsFixer\Finder::create()
    ->in([
        'src',
        'tests',
    ])
    ->name('*.php')
;

return (new PhpCsFixer\Config())
    ->setFinder($finder)
    ->setRules([
        '@PER' => true,
        '@PER:risky' => true,
        'visibility_required' => [
            'elements' => [
                'property',
                'method',
                // 'const', // Not supported in php < 7.1
            ],
        ],
        'no_unused_imports' => true,
        'single_quote' => true,
        'no_extra_blank_lines' => true,
        'array_indentation' => true,
        'cast_spaces' => true,
        'phpdoc_align' => [
            'align' => 'left',
        ],
        'binary_operator_spaces' => true,
        'single_line_empty_body' => false,
    ])
;

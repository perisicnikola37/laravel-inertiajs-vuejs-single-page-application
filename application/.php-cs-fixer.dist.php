<?php

// .php-cs-fixer.dist.php
$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__.'/app')
    ->in(__DIR__.'/routes')
    ->in(__DIR__.'/database')
    ->in(__DIR__.'/tests');

return (new PhpCsFixer\Config())
    ->setRules([
        '@PSR12' => true, // PSR-12 coding style
        'array_syntax' => ['syntax' => 'short'],
        'no_trailing_comma_in_list_call' => true,
        'blank_line_after_namespace' => true,
        'braces' => ['position_after_anonymous_constructs' => 'next'],
    ])
    ->setFinder($finder);

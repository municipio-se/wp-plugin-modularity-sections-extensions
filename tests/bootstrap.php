<?php

declare(strict_types=1);

define('ABSPATH', __DIR__);

$GLOBALS['sections_extensions_test_filters'] = [];

function add_filter(string $hook, callable $callback, int $priority = 10, int $acceptedArgs = 1): void
{
    $GLOBALS['sections_extensions_test_filters'][] = [$hook, $callback, $priority, $acceptedArgs];
}

require dirname(__DIR__) . '/vendor/autoload.php';

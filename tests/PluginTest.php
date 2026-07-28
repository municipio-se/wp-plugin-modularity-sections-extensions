<?php

declare(strict_types=1);

namespace MunicipioModularitySectionsExtensions\Tests;

use MunicipioModularitySectionsExtensions\Fields;
use MunicipioModularitySectionsExtensions\Plugin;
use PHPUnit\Framework\TestCase;

final class PluginTest extends TestCase
{
    protected function setUp(): void
    {
        $GLOBALS['sections_extensions_test_filters'] = [];
    }

    public function testItRegistersOnlyTheThreeExactFieldFilters(): void
    {
        (new Plugin())->register();

        static::assertSame(
            [
                'acf/load_field/key=field_63ff1e7124e0e',
                'acf/load_field/key=field_60d1a8040b829',
                'acf/load_field/key=field_6154339333497',
            ],
            array_column($GLOBALS['sections_extensions_test_filters'], 0),
        );
        static::assertSame([10, 10, 10], array_column($GLOBALS['sections_extensions_test_filters'], 2));
        static::assertSame([1, 1, 1], array_column($GLOBALS['sections_extensions_test_filters'], 3));

        foreach ($GLOBALS['sections_extensions_test_filters'] as [, $callback]) {
            static::assertSame([Fields::class, 'enableWysiwyg'], $callback);
        }
    }

    public function testThePluginContainsNoActivationOrMetadataWrites(): void
    {
        $plugin = file_get_contents(dirname(__DIR__) . '/modularity-sections-extensions.php');
        $sourceFiles = glob(dirname(__DIR__) . '/source/*.php');
        $source = implode("\n", array_map('file_get_contents', is_array($sourceFiles) ? $sourceFiles : []));

        static::assertIsString($plugin);
        static::assertStringNotContainsString('register_activation_hook', $plugin . $source);
        static::assertStringNotContainsString('update_post_meta', $plugin . $source);
        static::assertStringNotContainsString('update_field', $plugin . $source);
    }
}

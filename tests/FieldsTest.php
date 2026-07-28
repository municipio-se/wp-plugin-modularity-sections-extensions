<?php

declare(strict_types=1);

namespace MunicipioModularitySectionsExtensions\Tests;

use MunicipioModularitySectionsExtensions\Fields;
use PHPUnit\Framework\TestCase;

final class FieldsTest extends TestCase
{
    public function testItChangesOnlyTheControlAndToolbar(): void
    {
        $field = [
            'key' => 'field_60d1a8040b829',
            'label' => 'Text',
            'name' => 'text',
            'type' => 'textarea',
            'toolbar' => 'basic',
            'conditional_logic' => [['field' => 'layout', 'operator' => '==', 'value' => 'split']],
            'wrapper' => ['width' => '75'],
            'custom_property' => 'preserved',
        ];

        $result = Fields::enableWysiwyg($field);

        static::assertSame('wysiwyg', $result['type']);
        static::assertSame('full', $result['toolbar']);
        static::assertSame($field['conditional_logic'], $result['conditional_logic']);
        static::assertSame($field['wrapper'], $result['wrapper']);
        static::assertSame('preserved', $result['custom_property']);
        static::assertSame(
            array_diff_key($field, ['type' => true, 'toolbar' => true]),
            array_diff_key($result, ['type' => true, 'toolbar' => true]),
        );
    }

    public function testItAddsTheWysiwygPropertiesWhenTheTextareaDoesNotDefineThem(): void
    {
        $field = [
            'key' => 'field_63ff1e7124e0e',
            'type' => 'textarea',
        ];

        static::assertSame(
            [
                'key' => 'field_63ff1e7124e0e',
                'type' => 'wysiwyg',
                'toolbar' => 'full',
            ],
            Fields::enableWysiwyg($field),
        );
    }
}

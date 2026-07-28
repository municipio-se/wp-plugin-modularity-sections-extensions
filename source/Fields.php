<?php

declare(strict_types=1);

namespace MunicipioModularitySectionsExtensions;

final class Fields
{
    /**
     * Preserve the current field definition and change only the two properties
     * that Municipio Extended owned in LTS.
     *
     * @param array<string, mixed> $field
     *
     * @return array<string, mixed>
     */
    public static function enableWysiwyg(array $field): array
    {
        $field['type'] = 'wysiwyg';
        $field['toolbar'] = 'full';

        return $field;
    }
}

<?php

declare(strict_types=1);

namespace MunicipioModularitySectionsExtensions;

final class Plugin
{
    /**
     * These stable keys are shared by the verified LTS and current Sections
     * packages. Key-specific filters avoid affecting unrelated WYSIWYG fields.
     *
     * @var list<string>
     */
    private const FIELD_KEYS = [
        'field_63ff1e7124e0e',
        'field_60d1a8040b829',
        'field_6154339333497',
    ];

    public function register(): void
    {
        foreach (self::FIELD_KEYS as $fieldKey) {
            add_filter('acf/load_field/key=' . $fieldKey, [Fields::class, 'enableWysiwyg']);
        }
    }
}

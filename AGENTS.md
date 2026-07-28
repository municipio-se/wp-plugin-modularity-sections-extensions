# Repository instructions

## Scope

This plugin ports focused editor behavior for Modularity Sections to modern
Municipio. Keep it independent of Municipio Cloud and the deprecated standalone
Modularity plugin.

Preserve the existing Sections field keys and raw metadata. Do not add
templates, write migrations, frontend assets, or unrelated LTS features without
a separately confirmed outcome.

## Verification

Run these commands after changing PHP or runtime behavior:

```console
composer format
composer test
composer lint
```

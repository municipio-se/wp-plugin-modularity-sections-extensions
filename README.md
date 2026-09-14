# Modularity Sections Extensions

Modularity Sections Extensions ports focused editor behavior from Municipio LTS
to modern Municipio without restoring the deprecated standalone Modularity
plugin.

## Supported first port

The existing Sections modules, fields, controllers, views, and components remain
the source of truth. This plugin changes only the editor control and toolbar for
three stable ACF fields:

- Section card `field_63ff1e7124e0e` uses WYSIWYG with the full toolbar.
- Section split/featured `field_60d1a8040b829` uses WYSIWYG with the full
  toolbar.
- Section full `field_6154339333497` keeps WYSIWYG and uses the full toolbar.

Labels, conditions, wrappers, saved values, and every other field property are
preserved. Custom views, frontend assets, and write migrations are intentionally
outside this release.

## Installation

Release candidates, verification, publication and rollback are documented in
[RELEASING.md](RELEASING.md). See [CHANGELOG.md](CHANGELOG.md) for version
history.

Install `municipio/wp-plugin-modularity-sections-extensions` with Composer.
Composer Installers places it in
`wp-content/plugins/modularity-sections-extensions` through
`extra.installer-name`.

The plugin supports modern Municipio only. The initial compatibility contract is
verified against `helsingborg-stad/municipio` 6.43.2 and
`helsingborg-stad/modularity-sections` 4.0.4.

## Data and deactivation

No activation or write migration runs. Raw Section metadata remains untouched in
the database.

The plugin is a permanent dependency while editors need the LTS WYSIWYG controls
and formatting. Deactivation returns the fields to their upstream definitions
without modifying stored metadata.

## Extension points

The plugin consumes three public ACF filters:

- `acf/load_field/key=field_63ff1e7124e0e`
- `acf/load_field/key=field_60d1a8040b829`
- `acf/load_field/key=field_6154339333497`

Each filter changes only `type` and `toolbar`.

## Development

```console
composer format
composer test
composer lint
```

# Release process

## Released 1.0.0

Version
[1.0.0](https://github.com/municipio-se/wp-plugin-modularity-sections-extensions/releases/tag/1.0.0)
was published on 2026-09-17. Composer derives the version from the immutable Git
tag; do not add a version field to composer.json.

Use independent SemVer for the documented settings, stored data, integration
points and behavior. Backward-incompatible changes require a major release,
compatible additions a minor release and compatible fixes a patch release.

## Compatibility and acceptance

The current integration target is WordPress 6.9.7, PHP 8.3 and the bundled
Modularity in Municipio theme 6.43.3, with modularity-sections 4.0.4. Release
acceptance covers the documented reference cases. Preserve any earlier verified
contracts described in README. Sections also requires verification of the exact
installed modularity-sections version. The PHP ^8.2 Composer requirement does
not mean every permitted platform combination has been tested. Record exact
dependencies and required upstream patches with the acceptance evidence before
extending support.

Verify the three documented field keys in an installation using Sections,
including save/reload and frontend preservation of formatted content. Use a
separate reference if the primary installation does not use Sections.

The pre-release suite passed on PHP 8.3.33 (4 tests / 17 assertions) on
2026-09-14. These are isolated tests and do not replace WordPress reference
acceptance. Existing lint diagnostics must be reviewed; a successful lint exit
is not a claim of zero warnings.

## Checklist for future releases

1. Review the final commit, changelog, plugin header and any asset-version
   constants. Run composer validate --strict, composer format, composer test and
   composer lint. Review formatting changes before committing.
2. Verify a fresh Composer installation and the supported upgrade paths in a
   named reference environment. Check shipped source, views, translations and
   assets where present; preserve saved content and unrelated behavior.
3. Obtain approval for the exact release commit and compatibility evidence. Only
   then publish an annotated version tag and matching GitHub release. Never move
   a published tag; corrections require a new version.
4. Verify Packagist indexes the release and that Composer source and dist
   references equal the tag's peeled commit. If indexing fails, investigate the
   existing integration before requesting a manual update. Do not treat local
   candidate installation as proof of published distribution.
5. In each approved consumer, require
   municipio/wp-plugin-modularity-sections-extensions:^1.0, review the
   dependency diff, commit the lockfile, deploy after approval and repeat the
   relevant reference checks. Retain the previous lockfile and deployment
   reference for rollback.

## Rollback

No activation or write migration runs. Roll back the package and lockfile; raw
Section metadata remains intact.

## Publication evidence, 2026-09-17

The published tag was verified against Composer source/dist references and a
clean installation. The Staffanstorps Centrum reference uses WordPress 6.9.7,
PHP 8.3.6, Municipio 6.43.3 and Sections 4.0.4. All three field keys remained
WYSIWYG/full across four blogs and 2,786 inspected metadata rows were unchanged.
The split section body and CTA were manually confirmed as separate paragraphs. A
pre-existing Blade cache-directory race is tracked separately; this release does
not fix it.

This documentation was corrected after publication. The immutable 1.0.0 archive
retains the original candidate wording. Never move the tag to include this
documentation correction.

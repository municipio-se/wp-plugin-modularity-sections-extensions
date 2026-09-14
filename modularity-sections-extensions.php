<?php

/**
 * Plugin Name: Modularity Sections Extensions
 * Description: Adds focused Sections editor behavior to modern Municipio.
 * Version: 1.0.0
 * Requires PHP: 8.2
 * Author: Whitespace
 * License: MIT
 * Text Domain: modularity-sections-extensions
 */

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit();
}

/**
 * Composer's installer-name is the production path contract. The fixed WordPress slug also keeps
 * autoloading stable when the local package is installed through a symlink.
 */
define('MODULARITY_SECTIONS_EXTENSIONS_PATH', trailingslashit(WP_PLUGIN_DIR) . 'modularity-sections-extensions/');

$autoload = MODULARITY_SECTIONS_EXTENSIONS_PATH . 'vendor/autoload.php';

if (is_readable($autoload)) {
    require_once $autoload;
}

if (class_exists(\MunicipioModularitySectionsExtensions\Plugin::class)) {
    (new \MunicipioModularitySectionsExtensions\Plugin())->register();
}

<?php
/**
 * Plugin Name:       X3P0: Powered By
 * Plugin URI:        https://github.com/x3p0-dev/x3p0-powered-by
 * Description:       A block that generates a random "Powered by" message. It is meant to replace the typical "Powered by Theme/WordPress" message in footers but can be used anywhere.
 * Version:           2.0.0-alpha
 * Requires at least: 6.8
 * Requires PHP:      8.0
 * Author:            Justin Tadlock
 * Author URI:        https://justintadlock.com
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       x3p0-powered-by
 */

namespace X3P0\PoweredBy;

// Load classes and files.
require_once 'src/Block.php';
require_once 'src/Superpower.php';
require_once 'src/functions-helpers.php';

// Bootstrap the plugin.
plugin();

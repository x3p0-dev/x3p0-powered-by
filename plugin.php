<?php
/**
 * Plugin Name:       X3P0 - Powered By...
 * Plugin URI:        https://github.com/x3p0-dev/x3p0-powered-by
 * Description:       Random "powered by" message block.
 * Version:           1.0.0-alpha
 * Requires at least: 5.9
 * Requires PHP:      8.0
 * Author:            Justin Tadlock
 * Author URI:        https://x3p0.com
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       x3p0-powered-by
 */

namespace X3P0\PoweredBy;

// Autoload classes and files.
require_once 'src/Block.php';
require_once 'src/Superpower.php';
require_once 'src/functions-helpers.php';

// Bootstrap the plugin.
plugin();
<?php

/**
 * Block render.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2022, Justin Tadlock
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @link      https://github.com/x3p0-dev/x3p0-powered-by
 */

declare(strict_types=1);

# Prevent direct access.
defined('ABSPATH') || exit;

use X3P0\PoweredBy\Block\PoweredBy;

/**
 * @global array $attributes
 */
echo (new PoweredBy($attributes))->render(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

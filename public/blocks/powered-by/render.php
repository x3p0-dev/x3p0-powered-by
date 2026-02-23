<?php

/**
 * Block render.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2022-2025, Justin Tadlock
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @link      https://github.com/x3p0-dev/x3p0-powered-by
 */

declare(strict_types=1);

# Prevent direct access.
defined('ABSPATH') || exit;

use X3P0\PoweredBy\Type\Block\PoweredBy;

/**
 * @global array    $attributes Block attributes.
 * @global string   $content    The block content.
 * @global WP_Block $block      Block instance.
 */
// phpcs:disable WordPress.Security.EscapeOutput.OutputNotEscaped
echo (new PoweredBy())->render(
	attributes: $attributes,
	content:    $content,
	block:      $block
);
// phpcs:enable WordPress.Security.EscapeOutput.OutputNotEscaped

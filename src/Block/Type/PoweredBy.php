<?php

/**
 * Block class.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2022-2025, Justin Tadlock
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @link      https://github.com/x3p0-dev/x3p0-powered-by
 */

declare(strict_types=1);

namespace X3P0\PoweredBy\Type\Block;

use WP_Block;
use X3P0\PoweredBy\Block\Block;
use X3P0\PoweredBy\Tools\Superpower;

/**
 * Front-end handling of the `x3p0/powered-by` block.
 */
final class PoweredBy implements Block
{
	/**
	 * Renders the block on the front end.
	 */
	public function render(array $attributes, string $content, WP_Block $block): string
	{
		$attributes = wp_parse_args($attributes, [
			'poweredByType' => ''
		]);

		// Return the block output.
		return sprintf(
			'<p %s>%s</p>',
			get_block_wrapper_attributes(),
			esc_html(Superpower::render($attributes['poweredByType']))
		);
	}
}

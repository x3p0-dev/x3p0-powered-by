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

namespace X3P0\PoweredBy\Block;

use X3P0\PoweredBy\Tools\Superpower;

/**
 * Front-end handling of the `x3p0/powered-by` block.
 */
class PoweredBy
{
	/**
	 * Sets up object state.
	 */
	public function __construct(protected array $attributes = [])
	{}

	/**
	 * Renders the block on the front end.
	 */
	public function render(): string
	{
		$this->attributes = wp_parse_args($this->attributes, [
			'poweredByType' => ''
		]);

		// Return the block output.
		return sprintf(
			'<p %s>%s</p>',
			get_block_wrapper_attributes(),
			esc_html(Superpower::render($this->attributes['poweredByType']))
		);
	}
}

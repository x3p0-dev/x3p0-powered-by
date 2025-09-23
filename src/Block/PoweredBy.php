<?php

/**
 * Block class.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2022, Justin Tadlock
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @link      https://github.com/x3p0-dev/x3p0-powered-by
 */

declare(strict_types=1);

namespace X3P0\PoweredBy\Block;

use X3P0\PoweredBy\Superpower;

class PoweredBy
{
	public function __construct(protected array $attributes = [])
	{}

	public function render(): string
	{
		$this->attributes = wp_parse_args($this->attributes, [
			'textAlign'     => '',
			'poweredByType' => ''
		]);

		// Return the block output.
		return sprintf(
			'<p %s>%s</p>',
			get_block_wrapper_attributes([
				'class' => $this->attributes['textAlign']
					? esc_attr("has-text-align-{$this->attributes['textAlign']}")
					: ''
			]),
			esc_html((new Superpower())->render($this->attributes['poweredByType']))
		);
	}
}

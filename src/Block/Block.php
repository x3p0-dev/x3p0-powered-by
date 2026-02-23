<?php

/**
 * Block interface.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2022-2025, Justin Tadlock
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @link      https://github.com/x3p0-dev/x3p0-powered-by
 */

declare(strict_types=1);

namespace X3P0\PoweredBy\Block;

use WP_Block;

/**
 * The block class renders the block type on the front end.
 */
interface Block
{
	/**
	 * Block render callback.
	 */
	public function render(array $attributes, string $content, WP_Block $block): string;
}

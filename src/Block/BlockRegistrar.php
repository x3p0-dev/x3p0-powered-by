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
 * Registers the `x3p0/powered-by` block with WordPress.
 */
class BlockRegistrar
{
	/**
	 * Filename of the blocks manifest.
	 */
	private const MANIFEST_FILENAME = 'manifest.php';

	/**
	 * Sets the path where the built blocks are stored.
	 */
	public function __construct(protected readonly string $path)
	{}

	/**
	 * Boots the component, running its actions/filters.
	 */
	public function boot(): void
        {
                add_action('init', [$this, 'register']);
        }

	/**
	 * Registers the block with WordPress.
	 */
        public function register(): void
        {
		wp_register_block_types_from_metadata_collection(
			$this->path,
			"{$this->path}/" . self::MANIFEST_FILENAME
		);

		wp_set_script_translations(
			generate_block_asset_handle('x3p0/powered-by', 'editorScript'),
			'x3p0-powered-by'
		);

		wp_localize_script(
			generate_block_asset_handle('x3p0/powered-by', 'editorScript'),
			'x3p0PoweredBy',
			[ 'messages' => Superpower::messages() ]
		);
        }
}

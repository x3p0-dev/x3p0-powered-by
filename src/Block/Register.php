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

use WP_Block;
use X3P0\PoweredBy\Superpower;

class Register
{
        /**
         * Sets up object state.
         */
        public function __construct(protected string $path)
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
			"{$this->path}/manifest.php"
		);

		wp_set_script_translations(
			generate_block_asset_handle('x3p0/powered-by', 'editorScript'),
			'x3p0-powered-by'
		);

		wp_localize_script(
			generate_block_asset_handle('x3p0/powered-by', 'editorScript'),
			'x3p0PoweredBy',
			[ 'messages' => (new Superpower())->messages() ]
		);
        }

	/**
	 * Renders the block on the front end.
	 *
	 * @since 1.0.0
	 */
        public function render(array $attr, string $content, WP_Block $block): string
        {
		$attr = array_merge([
			'textAlign'     => '',
			'poweredByType' => ''
		], $attr);

		// Build text align class.
		$align = empty($attr['textAlign'])
		         ? ''
			 : "has-text-align-{$attr['textAlign']}";

		// Return the formatted block output.
                return sprintf(
                        '<div %s>%s</div>',
                        get_block_wrapper_attributes([
                                'class' => esc_attr($align)
                        ]),
			esc_html((new Superpower())->render($attr['poweredByType']))
               );
        }
}

<?php
/**
 * Block class.
 *
 * Registers and renders the block type on the front end.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2022, Justin Tadlock
 * @link      https://github.com/x3p0-dev/x3p0-powered-by
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace X3P0\PoweredBy;

use WP_Block;

class Block
{
	/**
	 * Stores the plugin path.
	 *
	 * @since 1.0.0
 	 * @todo  Move this to the constructor with PHP 8-only support.
	 */
	protected string $path;

	/**
	 * Stores the plugin path.
	 *
	 * @since 1.0.0
 	 * @todo  Move this to the constructor with PHP 8-only support.
	 */
	protected Superpower $superpower;

        /**
         * Sets up object state.
         *
         * @since 1.0.0
         */
        public function __construct( string $path, Superpower $superpower )
	{
		$this->path       = $path;
		$this->superpower = $superpower;
	}

        /**
         * Boots the component, running its actions/filters.
         *
         * @since 1.0.0
         */
        public function boot(): void
        {
                add_action( 'init', [ $this, 'register' ] );
        }

	/**
	 * Registers the block with WordPress.
	 *
	 * @since 1.0.0
	 */
        public function register(): void
        {
                register_block_type( $this->path . '/public', [
                        'render_callback' => [ $this, 'render' ]
                ] );

		wp_localize_script(
			generate_block_asset_handle( 'x3p0/powered-by', 'editorScript' ),
			'x3p0PoweredBy',
			[ 'messages' => $this->superpower->messages() ]
		);
        }

	/**
	 * Renders the block on the front end.
	 *
	 * @since 1.0.0
	 */
        public function render( array $attr, string $content, WP_Block $block ): string
        {
		$attr = array_merge( [
			'textAlign'     => '',
			'poweredByType' => ''
		], $attr );

		// Build text align class.
		$align = empty( $attr['textAlign'] )
		         ? ''
			 : "has-text-align-{$attr['textAlign']}";

		// Return the formatted block output.
                return sprintf(
                        '<div %s>%s</div>',
                        get_block_wrapper_attributes( [
                                'class' => esc_attr( $align )
                        ] ),
			esc_html( $this->superpower->text( $attr['poweredByType'] ) )
                );
        }
}

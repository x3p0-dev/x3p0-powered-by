<?php
/**
 * Block class.
 *
 * Registers and renders the block type on the front end.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2022, Justin Tadlock
 * @link      https://github.com/x3p0-dev/x3p0-comments-title
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace X3P0\PoweredBy;

use WP_Block;

class Block
{
        /**
         * Sets up object state.
         *
         * @since 1.0.0
         */
        public function __construct( protected string $path ) {}

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

		$align = 'left';

		// Return the formatted block output.
                return sprintf(
                        '<div %s>%s</div>',
                        get_block_wrapper_attributes( [
                                'class' => esc_attr( $align )
                        ] ),
			esc_html( ( new Superpower( $attr['poweredByType'] ) )->text() )
                );
        }
}

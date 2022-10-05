/**
 * Block edit.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2022, Justin Tadlock
 * @link      https://github.com/x3p0-dev/x3p0-comments-title
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

// External dependencies.
import classnames from 'classnames';

// WordPress dependencies.
import {
	AlignmentControl,
	BlockControls,
	InspectorControls,
	useBlockProps,
} from '@wordpress/block-editor';

import { PanelBody, RadioControl } from '@wordpress/components';

import { __ } from '@wordpress/i18n';

/**
 * Exports the block edit function.
 *
 * @since 1.0.0
 */
export default function Edit( {
	attributes: {
		textAlign,
		poweredByType
	},
	setAttributes
} ) {
	const blockProps = useBlockProps( {
		className: classnames( {
			[ `has-text-align-${ textAlign }` ]: textAlign,
		} )
	} );

	const blockControls = (
		<BlockControls group="block">
			<AlignmentControl
				value={ textAlign }
				onChange={ ( value ) =>
					setAttributes( { textAlign: value } )
				}
			/>
		</BlockControls>
	);

	const inspectorControls = (
		<InspectorControls>
			<PanelBody title={ __( 'Message Settings', 'x3p0-powered-by' ) }>
				<RadioControl
					label={ __( 'Message Type', 'x3p0-powered-by' ) }
					selected={ poweredByType }
					onChange={ ( value ) => setAttributes( {
						poweredByType: value
					} ) }
					options={ [
						{ value: "default", label: __( 'Default', 'x3p0-powered-by' ) },
						{ value: "emoji",   label: __( 'Emoji',   'x3p0-powered-by' ) },
					] }
				/>
			</PanelBody>
		</InspectorControls>
	);

	return (
		<>
			{ blockControls }
			{ inspectorControls }
			<div { ...blockProps }>
				{ 'emoji' === poweredByType
					? __( 'Powered by ☕.', 'x3po-powered-by' )
					: __( 'Powered by coffee.', 'x3po-powered-by' )
				}
			</div>
		</>
	);
}

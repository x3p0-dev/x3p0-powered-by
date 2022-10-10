/**
 * Block edit.
 *
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2022, Justin Tadlock
 * @link      https://github.com/x3p0-dev/x3p0-powered-by
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

// Localized script with plugin data.
const { messages } = x3p0PoweredBy;

// Get icons.
import { refreshIcon } from './icons';

// External dependencies.
import classnames from 'classnames';

// WordPress dependencies.
import {
	AlignmentControl,
	BlockControls,
	InspectorControls,
	useBlockProps
} from '@wordpress/block-editor';

import {
	PanelBody,
	ToggleControl,
	ToolbarButton
} from '@wordpress/components';

import { useState } from '@wordpress/element';

import { __ } from '@wordpress/i18n';

/**
 * Exports the block edit function.
 *
 * @since 1.0.0
 */
export default function Edit( {
	attributes: { textAlign, poweredByType },
	setAttributes
} ) {
	const blockProps = useBlockProps( {
		className: classnames( {
			[ `has-text-align-${ textAlign }` ]: textAlign,
		} )
	} );

	// Returns a randomized message based on the message type.
	const getMessage = ( type ) => {
		let collection = 'emoji' == type ? messages.emoji : messages.default;

		return collection[ Math.floor( Math.random() * collection.length ) ];
	};

	// Store the message in state.
	const [ message, setMessage ] = useState( getMessage( poweredByType ) );

	// Block toolbar group.
	// @link https://github.com/WordPress/gutenberg/blob/trunk/packages/block-editor/src/components/block-controls/groups.js
	const blockControls = (
		<>
			<BlockControls group="block">
				<AlignmentControl
					value={ textAlign }
					onChange={ ( value ) =>
						setAttributes( { textAlign: value } )
					}
				/>
			</BlockControls>
			<BlockControls group="other">
				<ToolbarButton
					icon={ refreshIcon }
					label={ __( 'Refresh Message', 'x3p0-powered-by' ) }
					onClick={ () => setMessage( getMessage( poweredByType ) ) }
				/>
			</BlockControls>
		</>
	);

	// Displays our custom settings in the block inspector.
	const inspectorControls = (
		<InspectorControls>
			<PanelBody title={ __( 'Message Settings', 'x3p0-powered-by' ) }>
				<ToggleControl
					label={ __( 'Emojify', 'x3p0-powered-by' ) }
					help={
						'emoji' === poweredByType
						? __( 'Show messages with emoji.', 'x3p0-powered-by' )
						: __( 'Show messages without emoji.', 'x3p0-powered-by' )
					}
					checked={ 'emoji' === poweredByType }
					onChange={ ( state ) => {
						let value = state ? 'emoji' : '';

						setAttributes( {
							poweredByType: value
						} );

						setMessage( getMessage( value ) );
					} }
				/>
			</PanelBody>
		</InspectorControls>
	);

	return (
		<>
			{ blockControls }
			{ inspectorControls }
			<div { ...blockProps }>
				{ message }
			</div>
		</>
	);
}

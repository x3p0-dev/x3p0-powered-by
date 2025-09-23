/**
 * Block edit.
 *
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2022-2025, Justin Tadlock
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @link      https://github.com/x3p0-dev/x3p0-powered-by
 */

// Localized script with plugin data.
const { messages } = x3p0PoweredBy;

// Get icons.
import { refreshIcon } from './icons';

// WordPress dependencies.
import {
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
 */
export default function Edit({
	attributes: { poweredByType },
	setAttributes
}) {
	const blockProps = useBlockProps();

	// Returns a randomized message based on the message type.
	const getMessage = (type) => {
		let collection = 'emoji' === type ? messages.emoji : messages.text;

		return collection[ Math.floor(Math.random() * collection.length) ];
	};

	// Store the message in state.
	const [ message, setMessage ] = useState(getMessage(poweredByType));

	return (
		<>
			<BlockControls group="other">
				<ToolbarButton
					icon={ refreshIcon }
					label={ __('Refresh Message', 'x3p0-powered-by') }
					onClick={ () => setMessage(getMessage(poweredByType)) }
				/>
			</BlockControls>
			<InspectorControls>
				<PanelBody title={ __('Settings', 'x3p0-powered-by') }>
					<ToggleControl
						label={ __('Emojify', 'x3p0-powered-by') }
						help={'emoji' === poweredByType
							? __('Show messages with emoji.', 'x3p0-powered-by')
							: __('Show plain text messages.', 'x3p0-powered-by')
						}
						checked={ 'emoji' === poweredByType }
						onChange={ (state) => {
							let value = state ? 'emoji' : 'text';

							setAttributes({
								poweredByType: value
							});

							setMessage(getMessage(value));
						} }
						__nextHasNoMarginBottom={true}
					/>
				</PanelBody>
			</InspectorControls>
			<p { ...blockProps }>
				{ message }
			</p>
		</>
	);
}

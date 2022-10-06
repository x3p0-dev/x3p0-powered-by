/**
 * Entry point.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2022, Justin Tadlock
 * @link      https://github.com/x3p0-dev/x3p0-powered-by
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

// Import stylesheets.
import './css/style.scss';

// Internal dependencies.
import { blockIcon } from './js/icons';
import blockEdit from './js/edit';
import blockSave from './js/save';
import blockData from './block.json';

// WordPress dependencies.
import { registerBlockType } from '@wordpress/blocks';

// Register block type.
registerBlockType( blockData, {
	icon: blockIcon,
	edit: blockEdit,
	save: blockSave
} );

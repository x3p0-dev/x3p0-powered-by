/**
 * Entry point.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2022, Justin Tadlock
 * @link      https://github.com/x3p0-dev/x3p0-powered-by
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

// Import stylesheets.
import './scss/style.scss';

// Import dependencies.
import { registerBlockType } from '@wordpress/blocks';
import { cupHotFillIcon }    from './js/icons';
import blockEdit             from './js/block-edit';
import blockData             from './block.json';

// Register block type.
registerBlockType( blockData, {
	icon: cupHotFillIcon,
	edit: blockEdit
} );

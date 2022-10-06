<?php
/**
 * Class for randomly generating a "powered by" message.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2022, Justin Tadlock
 * @link      https://github.com/x3p0-dev/x3p0-powered-by
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace X3P0\PoweredBy;

class Superpower
{
	/**
	 * Holds the potential messages.
	 *
	 * @since 1.0.0
	 */
	protected array $messages = [];

	/**
	 * Sets the initial object state.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {

		$this->messages['default'] = [
			__( 'Powered by heart and soul.', 'x3po-powered-by' ),
			__( 'Powered by crazy ideas and passion.', 'x3po-powered-by' ),
			__( 'Powered by the thing that holds all things together in the universe.', 'x3po-powered-by' ),
			__( 'Powered by love.', 'x3po-powered-by' ),
			__( 'Powered by the vast and endless void.', 'x3po-powered-by' ),
			__( 'Powered by the code of a maniac.', 'x3po-powered-by' ),
			__( 'Powered by peace and understanding.', 'x3po-powered-by' ),
			__( 'Powered by coffee.', 'x3po-powered-by' ),
			__( 'Powered by sleepless nights.', 'x3po-powered-by' ),
			__( 'Powered by the love of all things.', 'x3po-powered-by' ),
			__( 'Powered by something greater than myself.', 'x3po-powered-by' ),
			// 2022-10-05 - @justintadlock
			__( 'Powered by elbow grease. Held together by tape and bubble gum.', 'x3po-powered-by' ),
			__( 'Powered by an old mixtape and memories of lost love.', 'x3po-powered-by' ),
			__( 'Powered by thoughts of old love letters.', 'x3p-powered-by' )
		];

		// @todo Come up with emoji equivalents for the messages that
		// are commented out.
		$this->messages['emoji'] = [
			__( 'Powered by ❤️ and soul.', 'x3po-powered-by' ),
			__( 'Powered by crazy 🤔 and passion.', 'x3po-powered-by' ),
		//	__( 'Powered by the thing that holds all things together in the universe.', 'x3po-powered-by' ),
			__( 'Powered by ❤️.', 'x3po-powered-by' ),
		//	__( 'Powered by the vast and endless void.', 'x3po-powered-by' ),
		//	__( 'Powered by the code of a maniac.', 'x3po-powered-by' ),
			__( 'Powered by ☮️ and understanding.', 'x3po-powered-by' ),
			__( 'Powered by ☕.', 'x3po-powered-by' ),
			__( 'Powered by sleepless 🌛.', 'x3po-powered-by' ),
			__( 'Powered by ❤️ for all things.', 'x3po-powered-by' ),
		//	__( 'Powered by something greater than myself.', 'x3po-powered-by' ),
			// 2022-10-05 - @justintadlock
		//	__( 'Powered by elbow grease. Held together by tape and bubble gum.', 'x3po-powered-by' ),
			__( 'Powered by an old mix 💿 and memories of 💔.', 'x3po-powered-by' ),
			__( 'Powered by thoughts of old 💌.', 'x3p0-powered-by' )
		];
	}

	/**
	 * Returns the message.
	 *
	 * @since 1.0.0
	 */
	public function text( string $type = '' ): string
	{
		$collection = 'emoji' === $type
		              ? $this->messages['emoji']
			      : $this->messages['default'];

		return $collection[ array_rand( $collection, 1 ) ];
	}

	/**
	 * Returns the default messages.
	 *
	 * @since 1.0.0
	 */
	public function messages(): array
	{
		return $this->messages;
	}
}

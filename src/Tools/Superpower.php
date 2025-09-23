<?php
/**
 * Superpower class.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2022-2025, Justin Tadlock
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @link      https://github.com/x3p0-dev/x3p0-powered-by
 */

declare(strict_types=1);

namespace X3P0\PoweredBy\Tools;

/**
 * Generates a random "powered by" message.
 */
class Superpower
{
	/**
	 * Stores the messages.
	 */
	protected static array $messages = [];

	/**
	 * Renders the message by type.
	 */
	public static function render(string $type = ''): string
	{
		$messages = self::messages();
		$collection = $messages[$type] ?? array_merge(...array_values($messages));

		return $collection[ array_rand($collection) ];
	}

	/**
	 * Returns the default messages.
	 */
	public static function messages(): array
	{
		if ([] === self::$messages) {
			self::$messages['text'] = [
				__('Powered by heart and soul.', 'x3p0-powered-by'),
				__('Powered by crazy ideas and passion.', 'x3p0-powered-by'),
				__('Powered by the thing that holds all things together in the universe.', 'x3p0-powered-by'),
				__('Powered by love.', 'x3p0-powered-by'),
				__('Powered by the vast and endless void.', 'x3p0-powered-by'),
				__('Powered by the code of a maniac.', 'x3p0-powered-by'),
				__('Powered by peace and understanding.', 'x3p0-powered-by'),
				__('Powered by coffee.', 'x3p0-powered-by'),
				__('Powered by sleepless nights.', 'x3p0-powered-by'),
				__('Powered by the love of all things.', 'x3p0-powered-by'),
				__('Powered by something greater than myself.', 'x3p0-powered-by'),
				// 2022-10-05 - @justintadlock
				__('Powered by elbow grease. Held together by tape and bubble gum.', 'x3p0-powered-by'),
				__('Powered by an old mixtape and memories of lost love.', 'x3p0-powered-by'),
				__('Powered by thoughts of old love letters.', 'x3p0-powered-by'),
				// 2025-08-02
				__('Powered by coffee and doughnuts.', 'x3p0-powered-by'),
				__('Powered by music that speaks to my soul.', 'x3p0-powered-by')
			];

			// @todo Come up with emoji equivalents for the messages that
			// are commented out.
			self::$messages['emoji'] = [
				__('Powered by ❤️ and soul.', 'x3p0-powered-by'),
				__('Powered by crazy 🤔 and passion.', 'x3p0-powered-by'),
				__('Powered by ❤️.', 'x3p0-powered-by'),
				__('Powered by ☮️ and understanding.', 'x3p0-powered-by'),
				__('Powered by ☕.', 'x3p0-powered-by'),
				__('Powered by sleepless 🌛.', 'x3p0-powered-by'),
				__('Powered by ❤️ for all things.', 'x3p0-powered-by'),
				// 2022-10-05 - @justintadlock
				__('Powered by an old mix 💿 and memories of 💔.', 'x3p0-powered-by'),
				__('Powered by thoughts of old 💌.', 'x3p0-powered-by'),
				// 2025-08-02
				__('Powered by ☕ and 🍩.', 'x3p0-powered-by'),
				__('Powered by 🎶 that speaks to my soul.', 'x3p0-powered-by')
			];

			// Add your own superpowers!
			self::$messages = apply_filters(
				'x3p0/powered-by/superpower/messages',
				self::$messages
			);
		}

		return self::$messages;
	}
}

<?php

namespace CCL\Content\Element\Basic;

use CCL\Content\Element\Basic\Container;

/**
 * A button representation.
 */
class Button extends Container
{

	/**
	 * Initiates the button with some optional text and icon.
	 *
	 * @param string $id
	 * @param string $text
	 * @param Icon $icon
	 * @param array $classes
	 * @param array $attributes
	 */
	public function __construct($id, $text = '', Icon $icon = null, array $classes = [], array $attributes = [])
	{
		parent::__construct($id, $classes, $attributes);

		if ($icon) {
			$this->addChild($icon);
		}
		if ($text) {
			$this->addChild(new TextBlock('text'))->setContent($text);
		}
	}
}

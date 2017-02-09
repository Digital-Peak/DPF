<?php
/**
 * @package    DPF
 * @author     Digital Peak http://www.digital-peak.com
 * @copyright  Copyright (C) 2007 - 2016 Digital Peak. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl.html GNU/GPL
 */
namespace DPF\Content\Element\Basic;

use DPF\Content\Element\Basic\Container;

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

<?php
/**
 * @package    DPF
 * @author     Digital Peak http://www.digital-peak.com
 * @copyright  Copyright (C) 2007 - 2016 Digital Peak. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl.html GNU/GPL
 */
namespace DPF\Content\Element\Basic\Form;

use DPF\Content\Element;

/**
 * A input representation.
 */
class Input extends Element
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
	public function __construct($id, $type, $name, $value = '', array $classes = [], array $attributes = [])
	{
		$attributes['type'] = $type;
		$attributes['name'] = $name;
		$attributes['value'] = $value;

		parent::__construct($id, $classes, $attributes);
	}

	/**
	 *
	 * {@inheritdoc}
	 *
	 * @see Element::getTagName()
	 */
	public function getTagName()
	{
		return 'input';
	}
}

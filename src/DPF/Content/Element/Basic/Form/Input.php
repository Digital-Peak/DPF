<?php
/**
 * @package    DPF
 * @author     Digital Peak http://www.digital-peak.com
 * @copyright  Copyright (C) 2007 - 2016 Digital Peak. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl.html GNU/GPL
 */
namespace DPF\Content\Element\Basic\Form;

use DPF\Content\Element\Basic\Element;

/**
 * A input representation.
 */
class Input extends Element
{

	/**
	 * Initiates the input for a given type and name.
	 *
	 * @param string $id
	 * @param string $type
	 * @param string $name
	 * @param string $value
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
}

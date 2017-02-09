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
 * A select option representation.
 */
class Option extends Element
{

	/**
	 * Initiates the label for the id of the given for input.
	 *
	 * @param string $value
	 * @param array $classes
	 * @param array $attributes
	 */
	public function __construct($id, $value, array $classes = [], array $attributes = [])
	{
		$attributes['value'] = $value;
		parent::__construct($id, $classes, $attributes);
	}
}

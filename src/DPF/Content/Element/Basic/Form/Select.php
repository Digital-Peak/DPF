<?php
/**
 * @package    DPF
 * @author     Digital Peak http://www.digital-peak.com
 * @copyright  Copyright (C) 2007 - 2016 Digital Peak. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl.html GNU/GPL
 */
namespace DPF\Content\Element\Basic\Form;

use DPF\Content\Element;
use DPF\Content\Element\Basic\Container;
use DPF\Content\Element\Basic\Custom;

/**
 * A select representation.
 */
class Select extends Container
{

	private $optionCounter = 1;

	/**
	 * Initiates the select for a given name.
	 *
	 * @param string $id
	 * @param string $name
	 * @param array $classes
	 * @param array $attributes
	 */
	public function __construct($id, $name, array $classes = [], array $attributes = [])
	{
		$attributes['name'] = $name;

		parent::__construct($id, $classes, $attributes);
	}

	/**
	 * Adds an option with the text and value, if selected is true, it gets the selected property.
	 *
	 * @param string $text
	 * @param string $value
	 * @param boolean $selected
	 *
	 * @return Element
	 */
	public function addOption($text, $value, $selected = false)
	{
		$attributes = array(
			'value' => $value
		);

		if ($selected) {
			$attributes['selected'] = 'selected';
		}
		$this->addChild(new Custom($this->getId() . '-' . $this->optionCounter, 'option', array(), $attributes))->setContent($text);
	}

	/**
	 *
	 * {@inheritdoc}
	 *
	 * @see Element::getTagName()
	 */
	public function getTagName()
	{
		return 'select';
	}
}

<?php
/**
 * @package    DPF
 * @author     Digital Peak http://www.digital-peak.com
 * @copyright  Copyright (C) 2007 - 2016 Digital Peak. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl.html GNU/GPL
 */
namespace DPF\Content\Element\Basic\Form;

use DPF\Content\Element\Basic\Container;

/**
 * A form label representation.
 */
class Label extends Container
{

	/**
	 * Initiates the label for the id of the given for input.
	 *
	 * @param string $forId
	 * @param Icon $icon
	 * @param array $classes
	 * @param array $attributes
	 */
	public function __construct($id, $forId, array $classes = [], array $attributes = [])
	{
		$attributes['for'] = $forId;
		parent::__construct($id, $classes, $attributes);
	}

	/**
	 *
	 * {@inheritdoc}
	 *
	 * @see \DPF\Content\Element\Basic\AbstractElement::getTagName()
	 */
	public function getTagName()
	{
		return 'label';
	}
}

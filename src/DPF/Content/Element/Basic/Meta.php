<?php
/**
 * @package    DPF
 * @author     Digital Peak http://www.digital-peak.com
 * @copyright  Copyright (C) 2007 - 2016 Digital Peak. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl.html GNU/GPL
 */
namespace DPF\Content\Element\Basic;

use DPF\Content\Element;

/**
 * A meta representation.
 */
class Meta extends Element
{

	/**
	 * Needs a property name and the content of the meta tag.
	 *
	 * @param string $id
	 * @param string $property
	 * @param string $content
	 * @param array $classes
	 * @param array $attributes
	 */
	public function __construct($id, $property, $content, array $classes = [], array $attributes = [])
	{
		$attributes['itemprop'] = $property;
		$attributes['content'] = $content;

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
		return 'meta';
	}
}

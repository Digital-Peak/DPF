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
 * A image representation.
 */
class Image extends Element
{

	/**
	 * Needs a source and an optional alt attribute.
	 *
	 * @param string $id
	 * @param string $src
	 * @param string $alt
	 * @param array $classes
	 * @param array $attributes
	 */
	public function __construct($id, $src, $alt = '', array $classes = [], array $attributes = [])
	{
		$attributes['src'] = $src;
		$attributes['alt'] = $alt;

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
		return 'img';
	}
}

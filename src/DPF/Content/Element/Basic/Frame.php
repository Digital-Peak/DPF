<?php
/**
 * @package    DPF
 * @author     Digital Peak http://www.digital-peak.com
 * @copyright  Copyright (C) 2007 - 2016 Digital Peak. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl.html GNU/GPL
 */
namespace DPF\Content\Element\Basic;

/**
 * A frame representation.
 */
class Frame extends Container
{

	public function __construct($id, $src, array $classes = [], array $attributes = [])
	{
		$attributes['src'] = $src;

		parent::__construct($id, $classes, $attributes);
	}
}

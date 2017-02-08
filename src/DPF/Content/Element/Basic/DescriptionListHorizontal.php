<?php
/**
 * @package    DPF
 * @author     Digital Peak http://www.digital-peak.com
 * @copyright  Copyright (C) 2007 - 2016 Digital Peak. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl.html GNU/GPL
 */
namespace DPF\Content\Element\Basic;

class DescriptionListHorizontal extends DescriptionList
{

	public function __construct($id, array $classes = [], array $attributes = [])
	{
		$classes[] = 'dpf-dl-horizontal';
		$this->setProtectedClass('dpf-dl-horizontal');

		parent::__construct($id, $classes, $attributes);
	}
}

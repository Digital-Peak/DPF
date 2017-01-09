<?php
/**
 * @package    DPF
 * @author     Digital Peak http://www.digital-peak.com
 * @copyright  Copyright (C) 2007 - 2016 Digital Peak. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl.html GNU/GPL
 */
namespace DPF\Content\Element\Basic\Grid;

use DPF\Content\Element\Basic\Container;
use DPF\Content\Element;

class Row extends Container
{

	public function __construct($id, array $classes = [], array $attributes = [])
	{
		$classes[] = 'dpf-row';
		$this->setProtectClass('dpf-row');

		parent::__construct($id, $classes, $attributes);
	}

	public function addColumn(Column $column)
	{
		return $this->addChild($column);
	}
}

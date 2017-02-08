<?php
/**
 * @package    DPF
 * @author     Digital Peak http://www.digital-peak.com
 * @copyright  Copyright (C) 2007 - 2016 Digital Peak. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl.html GNU/GPL
 */
namespace DPF\Content\Element\Basic\Grid;

use DPF\Content\Element\Basic\Container;

/**
 * A row representation.
 */
class Row extends Container
{

	public function __construct($id, array $classes = [], array $attributes = [])
	{
		$classes[] = 'dpf-row';
		$this->setProtectedClass('dpf-row');

		parent::__construct($id, $classes, $attributes);
	}

	/**
	 * Adds the given column to the internal childs and returns it for chaining.
	 *
	 * @param Column $column
	 * @return Column
	 */
	public function addColumn(Column $column)
	{
		return $this->addChild($column);
	}
}

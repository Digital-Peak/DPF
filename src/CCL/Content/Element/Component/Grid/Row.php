<?php

namespace CCL\Content\Element\Component\Grid;

use CCL\Content\Element\Basic\Container;

/**
 * A row representation.
 */
class Row extends Container
{

	public function __construct($id, array $classes = [], array $attributes = [])
	{
		$classes[] = 'ccl-row';
		$this->setProtectedClass('ccl-row');

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

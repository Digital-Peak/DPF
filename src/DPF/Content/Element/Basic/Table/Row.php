<?php
/**
 * @package    DPF
 * @author     Digital Peak http://www.digital-peak.com
 * @copyright  Copyright (C) 2007 - 2016 Digital Peak. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl.html GNU/GPL
 */
namespace DPF\Content\Element\Basic\Table;

use DPF\Content\Element\Basic\Container;

/**
 * A table row representation.
 */
class Row extends Container
{

	/**
	 * Adds the given cell to the internal child collection.
	 *
	 * @param Cell $cell
	 *
	 * @return Cell
	 */
	public function addCell(Cell $cell)
	{
		return $this->addChild($cell);
	}
}

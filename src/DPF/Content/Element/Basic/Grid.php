<?php
/**
 * @package    DPF
 * @author     Digital Peak http://www.digital-peak.com
 * @copyright  Copyright (C) 2007 - 2016 Digital Peak. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl.html GNU/GPL
 */
namespace DPF\Content\Element\Basic;

use DPF\Content\Element\Basic\Grid\Row;

/**
 * A grid representation.
 */
class Grid extends Container
{

	/**
	 * Adds the given row to the internal childs and returns it for chaining.
	 *
	 * @param Row $row
	 * @return Row
	 */
	public function addRow(Row $row)
	{
		return $this->addChild($row);
	}
}

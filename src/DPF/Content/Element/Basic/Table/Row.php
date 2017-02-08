<?php
/**
 * @package    DPF
 * @author     Digital Peak http://www.digital-peak.com
 * @copyright  Copyright (C) 2007 - 2016 Digital Peak. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl.html GNU/GPL
 */
namespace DPF\Content\Element\Basic\Table;

use DPF\Content\Element\Basic\Container;

class Row extends Container
{

	public function addCell(Cell $cell)
	{
		return $this->addChild($cell);
	}

	/**
	 *
	 * {@inheritDoc}
	 * @see \DPF\Content\Element\Basic\AbstractElement::getTagName()
	 */
	public function getTagName()
	{
		return 'tr';
	}
}

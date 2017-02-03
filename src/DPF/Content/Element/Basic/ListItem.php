<?php
/**
 * @package    DPF
 * @author     Digital Peak http://www.digital-peak.com
 * @copyright  Copyright (C) 2007 - 2016 Digital Peak. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl.html GNU/GPL
 */
namespace DPF\Content\Element\Basic;

use DPF\Content\Element\Basic\Container;

/**
 * A list item representation.
 */
class ListItem extends Container
{

	/**
	 *
	 * {@inheritdoc}
	 *
	 * @see \DPF\Content\Element::getTagName()
	 */
	public function getTagName()
	{
		return 'li';
	}
}

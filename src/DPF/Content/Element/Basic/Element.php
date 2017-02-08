<?php
/**
 * @package    DPF
 * @author     Digital Peak http://www.digital-peak.com
 * @copyright  Copyright (C) 2007 - 2016 Digital Peak. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl.html GNU/GPL
 */
namespace DPF\Content\Element\Basic;

use DPF\Content\Element\AbstractElement;

/**
 * A simple element representation.
 */
class Element extends AbstractElement
{

	/**
	 *
	 * {@inheritdoc}
	 *
	 * @see \DPF\Content\Element\AbstractElement::getTagName()
	 */
	public function getTagName()
	{
		return 'div';
	}
}

<?php
/**
 * @package    DPF
 * @author     Digital Peak http://www.digital-peak.com
 * @copyright  Copyright (C) 2007 - 2016 Digital Peak. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl.html GNU/GPL
 */
namespace DPF\Content\Framework;

use DPF\Content\Element\Basic\Alert;
use DPF\Content\Element\Basic\DescriptionListHorizontal;
use DPF\Content\Element\Basic\Grid\Column;
use DPF\Content\Element\Basic\Grid\Row;
use DPF\Content\Framework;
use DPF\Content\Element\Basic\Table;
use DPF\Content\Element;

/**
 * The Bootstrap 2 framework implementation.
 */
class BS2 implements Framework
{

	/**
	 *
	 * {@inheritdoc}
	 *
	 * @see \DPF\Content\Framework::prepareElement()
	 */
	public function prepareElement(Element $element)
	{
		switch (get_class($element)) {
			case DescriptionListHorizontal::class:
				$element->addClass('dl-horizontal');
				$element->setProtectClass('dl-horizontal');
				break;
			case Row::class:
				$element->addClass('row-fluid');
				$element->setProtectClass('row-fluid');
				break;
			case Column::class:
				$element->addClass('span' . $element->getWidth());
				$element->setProtectClass('span' . $element->getWidth());
				break;
			case Alert::class:
				$element->addClass('alert');
				$element->setProtectClass('alert');
				$element->addClass('alert-' . $element->getType());
				$element->setProtectClass('alert-' . $element->getType());
				break;
			case Table::class:
				$element->addClass('table');
				$element->setProtectClass('table');
				$element->addClass('table-stripped');
				$element->setProtectClass('table-stripped');
				break;
		}

		return $element;
	}
}

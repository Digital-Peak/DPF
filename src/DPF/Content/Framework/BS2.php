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
use DPF\Content\Element\Basic\Button;

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
		if ($element instanceof DescriptionListHorizontal) {
			$element->addClass('dl-horizontal');
			$element->setProtectClass('dl-horizontal');
		}

		if ($element instanceof Row) {
			$element->addClass('row-fluid');
			$element->setProtectClass('row-fluid');
		}

		if ($element instanceof Column) {
			$element->addClass('span' . $element->getWidth());
			$element->setProtectClass('span' . $element->getWidth());
		}

		if ($element instanceof Alert) {
			$element->addClass('alert');
			$element->setProtectClass('alert');
			$element->addClass('alert-' . $element->getType());
			$element->setProtectClass('alert-' . $element->getType());
		}

		if ($element instanceof Table) {
			$element->addClass('table');
			$element->setProtectClass('table');
			$element->addClass('table-stripped');
			$element->setProtectClass('table-stripped');
		}

		if ($element instanceof Button) {
			$element->addClass('btn');
			$element->setProtectClass('btn');
			$element->addClass('btn-default');
			$element->setProtectClass('btn-default');
		}

		return $element;
	}
}

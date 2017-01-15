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
use DPF\Content\Element\Basic\Form;

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
			$element->setProtectedClass('dl-horizontal');
		}

		if ($element instanceof Row) {
			$element->addClass('row-fluid');
			$element->setProtectedClass('row-fluid');
		}

		if ($element instanceof Column) {
			$element->addClass('span' . $element->getWidth());
			$element->setProtectedClass('span' . $element->getWidth());
		}

		if ($element instanceof Alert) {
			$element->addClass('alert');
			$element->setProtectedClass('alert');
			$element->addClass('alert-' . $element->getType());
			$element->setProtectedClass('alert-' . $element->getType());
		}

		if ($element instanceof Table) {
			$element->addClass('table');
			$element->setProtectedClass('table');
			$element->addClass('table-stripped');
			$element->setProtectedClass('table-stripped');
		}

		if ($element instanceof Button) {
			$element->addClass('btn');
			$element->setProtectedClass('btn');
			$element->addClass('btn-default');
			$element->setProtectedClass('btn-default');
		}

		if ($element instanceof Form) {
			$element->addClass('form-horizontal');
			$element->setProtectedClass('form-horizontal');
		}

		return $element;
	}
}

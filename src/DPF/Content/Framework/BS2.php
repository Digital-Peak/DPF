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
use DPF\Content\Element\Basic\TabContainer;

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
			$element->addClass('dl-horizontal', true);
		}

		if ($element instanceof Row) {
			$element->addClass('row-fluid', true);
		}

		if ($element instanceof Column) {
			$element->addClass('span' . $element->getWidth(), true);
		}

		if ($element instanceof Alert) {
			$element->addClass('alert', true);
			$element->addClass('alert-' . $element->getType(), true);
		}

		if ($element instanceof Table) {
			$element->addClass('table', true);
			$element->addClass('table-stripped', true);
		}

		if ($element instanceof Button) {
			$element->addClass('btn', true);
			$element->addClass('btn-default', true);
		}

		if ($element instanceof Form) {
			$element->addClass('form-horizontal', true);
		}
		if ($element instanceof TabContainer) {
			$tabLinks = $element->getTabLinks();
			$tabLinks->addClass('nav', true);
			$tabLinks->addClass('nav-tabs', true);
			foreach ($tabLinks->getChildren() as $index => $link) {
				if ($index == 0) {
					$link->addClass('active', true);
				}
				$link->getChildren()[0]->addAttribute('data-toggle', 'tab');
			}

			$element->getTabs()->addClass('tab-content', true);
			foreach ($element->getTabs()->getChildren() as $index => $tab) {
				if ($index == 0) {
					$tab->addClass('active', true);
				}
				$tab->addClass('tab-pane', true);
			}
		}

		return $element;
	}
}

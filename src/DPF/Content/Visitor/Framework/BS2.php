<?php
/**
 * @package    DPF
 * @author     Digital Peak http://www.digital-peak.com
 * @copyright  Copyright (C) 2007 - 2016 Digital Peak. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl.html GNU/GPL
 */
namespace DPF\Content\Framework;

use DPF\Content\Element\Basic\Alert;
use DPF\Content\Element\Basic\Badge;
use DPF\Content\Element\Basic\Button;
use DPF\Content\Element\Basic\DescriptionListHorizontal;
use DPF\Content\Element\Basic\Form;
use DPF\Content\Element\Basic\Grid\Column;
use DPF\Content\Element\Basic\Grid\Row;
use DPF\Content\Element\Basic\Link;
use DPF\Content\Element\Basic\Tab;
use DPF\Content\Element\Basic\TabContainer;
use DPF\Content\Element\Basic\Table;
use DPF\Content\Visitor\Basic\AbstractElementVisitor;

/**
 * The Bootstrap 2 framework visitor.
 */
class BS2 extends AbstractElementVisitor
{

	/**
	 *
	 * {@inheritdoc}
	 *
	 * @see \DPF\Content\Visitor\Basic\AbstractElementVisitor::visitAlert()
	 */
	public function visitAlert(Alert $alert)
	{
		$alert->addClass('alert', true);
		$alert->addClass('alert-' . $alert->getType(), true);
	}

	/**
	 *
	 * {@inheritdoc}
	 *
	 * @see \DPF\Content\Visitor\Basic\AbstractElementVisitor::visitBadge()
	 */
	public function visitBadge(Badge $badge)
	{
		$badge->addClass('badge', true);
		$badge->addClass('badge-' . $badge->getType(), true);
	}

	/**
	 *
	 * {@inheritdoc}
	 *
	 * @see \DPF\Content\Visitor\Basic\AbstractElementVisitor::visitButton()
	 */
	public function visitButton(Button $button)
	{
		$button->addClass('btn', true);
		$button->addClass('btn-default', true);
	}

	/**
	 *
	 * {@inheritdoc}
	 *
	 * @see \DPF\Content\Visitor\Basic\AbstractElementVisitor::visitDescriptionListHorizontal()
	 */
	public function visitDescriptionListHorizontal(DescriptionListHorizontal $descriptionListHorizontal)
	{
		$descriptionListHorizontal->addClass('dl-horizontal', true);
	}

	/**
	 *
	 * {@inheritdoc}
	 *
	 * @see \DPF\Content\Visitor\Basic\AbstractElementVisitor::visitForm()
	 */
	public function visitForm(Form $form)
	{
		$form->addClass('form-horizontal', true);
	}

	/**
	 *
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\Basic\ElementVisitor::visitGridColumn()
	 */
	public function visitGridColumn(Column $gridColumn)
	{
		$gridColumn->addClass('span' . $gridColumn->getWidth(), true);
	}

	/**
	 *
	 * {@inheritdoc}
	 *
	 * @see \DPF\Content\Visitor\Basic\AbstractElementVisitor::visitGridRow()
	 */
	public function visitGridRow(Row $gridRow)
	{
		$gridRow->addClass('row-fluid', true);
	}

	/**
	 *
	 * {@inheritdoc}
	 *
	 * @see \DPF\Content\Visitor\Basic\AbstractElementVisitor::visitTabContainer()
	 */
	public function visitTabContainer(TabContainer $tabContainer)
	{
		$tabLinks = $tabContainer->getTabLinks();
		$tabLinks->addClass('nav', true);
		$tabLinks->addClass('nav-tabs', true);
		foreach ($tabLinks->getChildren() as $index => $link) {
			if ($index == 0) {
				$link->addClass('active', true);
			}
			$link->getChildren()[0]->addAttribute('data-toggle', 'tab');
		}

		$tabContainer->getTabs()->addClass('tab-content', true);
		foreach ($tabContainer->getTabs()->getChildren() as $index => $tab) {
			if ($index == 0) {
				$tab->addClass('active', true);
			}
			$tab->addClass('tab-pane', true);
		}
	}

	/**
	 *
	 * {@inheritdoc}
	 *
	 * @see \DPF\Content\Visitor\Basic\AbstractElementVisitor::visitTable()
	 */
	public function visitTable(Table $table)
	{
		$table->addClass('table', true);
		$table->addClass('table-stripped', true);
	}
}

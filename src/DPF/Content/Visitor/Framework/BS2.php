<?php
/**
 * @package    DPF
 * @author     Digital Peak http://www.digital-peak.com
 * @copyright  Copyright (C) 2007 - 2016 Digital Peak. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl.html GNU/GPL
 */
namespace DPF\Content\Visitor\Framework;

use DPF\Content\Element\Component\Alert;
use DPF\Content\Element\Component\Badge;
use DPF\Content\Element\Basic\Button;
use DPF\Content\Element\Basic\DescriptionListHorizontal;
use DPF\Content\Element\Basic\Form;
use DPF\Content\Element\Component\Grid\Column;
use DPF\Content\Element\Component\Grid\Row;
use DPF\Content\Element\Basic\Link;
use DPF\Content\Element\Component\Tab;
use DPF\Content\Element\Component\TabContainer;
use DPF\Content\Element\Basic\Table;
use DPF\Content\Visitor\AbstractElementVisitor;

/**
 * The Bootstrap 2 framework visitor.
 */
class BS2 extends AbstractElementVisitor
{

	/**
	 * The alert mappings.
	 *
	 * @var array
	 */
	protected $alertTypes = [
		Alert::INFO    => 'info',
		Alert::SUCCESS => 'success',
		Alert::WARNING => 'warning',
		Alert::DANGER  => 'error'
	];

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\Content\Visitor\ElementVisitorInterface::visitAlert()
	 */
	public function visitAlert(Alert $alert)
	{
		$alert->addClass('alert', true);
		$alert->addClass('alert-' . $this->alertTypes[$alert->getType()], true);
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\Content\Visitor\ElementVisitorInterface::visitBadge()
	 */
	public function visitBadge(Badge $badge)
	{
		$badge->addClass('badge', true);
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\Content\Visitor\ElementVisitorInterface::visitButton()
	 */
	public function visitButton(Button $button)
	{
		$button->addClass('btn', true);
		$button->addClass('btn-default', true);
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\Content\Visitor\ElementVisitorInterface::visitDescriptionListHorizontal()
	 */
	public function visitDescriptionListHorizontal(DescriptionListHorizontal $descriptionListHorizontal)
	{
		$descriptionListHorizontal->addClass('dl-horizontal', true);
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\Content\Visitor\ElementVisitorInterface::visitForm()
	 */
	public function visitForm(Form $form)
	{
		$form->addClass('form-horizontal', true);
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\Content\Visitor\ElementVisitorInterface::visitGridColumn()
	 */
	public function visitGridColumn(Column $gridColumn)
	{
		$gridColumn->addClass('span' . $this->calculateWidth($gridColumn->getWidth()), true);
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\Content\Visitor\ElementVisitorInterface::visitGridRow()
	 */
	public function visitGridRow(Row $gridRow)
	{
		$gridRow->addClass('row-fluid', true);
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\Content\Visitor\ElementVisitorInterface::visitListContainer()
	 */
	public function visitListContainer(\DPF\Content\Element\Basic\ListContainer $listContainer)
	{
		$listContainer->addClass('list-striped', true);
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\Content\Visitor\ElementVisitorInterface::visitTabContainer()
	 */
	public function visitTabContainer(TabContainer $tabContainer)
	{
		// Set up the tab links
		$tabLinks = $tabContainer->getTabLinks();
		$tabLinks->addClass('nav', true);
		$tabLinks->addClass('nav-tabs', true);


		// Set the first one as active and add the toggle attribute
		foreach ($tabLinks->getChildren() as $index => $link) {
			if ($index == 0) {
				$link->addClass('active', true);
			}
			$link->getChildren()[0]->addAttribute('data-toggle', 'tab');
		}

		// Set up the tab content
		$tabContainer->getTabs()->addClass('tab-content', true);
		foreach ($tabContainer->getTabs()->getChildren() as $index => $tab) {
			if ($index == 0) {
				$tab->addClass('active', true);
			}
			$tab->addClass('tab-pane', true);
		}
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\Content\Visitor\ElementVisitorInterface::visitTable()
	 */
	public function visitTable(Table $table)
	{
		$table->addClass('table', true);
		$table->addClass('table-stripped', true);
	}

	/**
	 * Calculates the width.
	 *
	 * @param number $width
	 * @param number $maxWidth
	 *
	 * @return number
	 */
	protected function calculateWidth($width, $maxWidth = 12)
	{
		$newWidth = ($maxWidth / 100) * $width;
		$newWidth = round($newWidth);

		if ($newWidth < 1) {
			$newWidth = 1;
		}
		if ($newWidth > $maxWidth) {
			$newWidth = $maxWidth;
		}

		return $newWidth;
	}
}

<?php
/**
 * @package    DPF
 * @author     Digital Peak http://www.digital-peak.com
 * @copyright  Copyright (C) 2007 - 2016 Digital Peak. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl.html GNU/GPL
 */
namespace DPF\Content\Visitor\Framework;

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
use DPF\Content\Visitor\AbstractElementVisitor;
use DPF\Content\Element\Basic\Grid;

/**
 * The Uikit 2 framework visitor.
 */
class Uikit2 extends AbstractElementVisitor
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
		Alert::DANGER  => 'danger'
	];

	/**
	 *
	 * {@inheritdoc}
	 *
	 * @see \DPF\Content\Visitor\Basic\AbstractElementVisitorInterface::visitAlert()
	 */
	public function visitAlert(Alert $alert)
	{
		$alert->addClass('uk-alert', true);
		$alert->addClass('uk-alert-' . $this->alertTypes[$alert->getType()], true);
	}

	/**
	 *
	 * {@inheritdoc}
	 *
	 * @see \DPF\Content\Visitor\Basic\AbstractElementVisitorInterface::visitBadge()
	 */
	public function visitBadge(Badge $badge)
	{
		$badge->addClass('uk-badge', true);
	}

	/**
	 *
	 * {@inheritdoc}
	 *
	 * @see \DPF\Content\Visitor\Basic\AbstractElementVisitorInterface::visitButton()
	 */
	public function visitButton(Button $button)
	{
		$button->addClass('uk-button', true);
	}

	/**
	 *
	 * {@inheritdoc}
	 *
	 * @see \DPF\Content\Visitor\Basic\AbstractElementVisitorInterface::visitDescriptionListHorizontal()
	 */
	public function visitDescriptionListHorizontal(DescriptionListHorizontal $descriptionListHorizontal)
	{
		$descriptionListHorizontal->addClass('uk-description-list-horizontal', true);
	}

	/**
	 *
	 * {@inheritdoc}
	 *
	 * @see \DPF\Content\Visitor\Basic\AbstractElementVisitorInterface::visitForm()
	 */
	public function visitForm(Form $form)
	{
		$form->addClass('uk-form', true);
		$form->addClass('uk-form-horizontal', true);
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\ElementVisitorInterface::visitFormLabel()
	 */
	public function visitFormLabel(\DPF\Content\Element\Basic\Form\Label $formLabel)
	{
		$formLabel->addClass('uk-form-label', true);
	}

	/**
	 *
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\Basic\ElementVisitorInterface::visitGridColumn()
	 */
	public function visitGridColumn(Column $gridColumn)
	{
		$width = (10 / 100) * $gridColumn->getWidth();
		$width = round($width);

		if ($width < 1) {
			$width = 1;
		}
		if ($width > 10) {
			$width = 10;
		}

		$gridColumn->addClass('uk-width-' . $width . '-10', true);
	}

	/**
	 *
	 * {@inheritdoc}
	 *
	 * @see \DPF\Content\Visitor\Basic\AbstractElementVisitorInterface::visitGridRow()
	 */
	public function visitGridRow(Row $gridRow)
	{
		$gridRow->addClass('uk-grid', true);
		$gridRow->addClass('uk-grid-collapse', true);
	}

	/**
	 *
	 * {@inheritdoc}
	 *
	 * @see \DPF\Content\Visitor\Basic\AbstractElementVisitorInterface::visitTabContainer()
	 */
	public function visitTabContainer(TabContainer $tabContainer)
	{
		// Set up the tab links
		$tabLinks = $tabContainer->getTabLinks();
		$tabLinks->addClass('uk-tab', true);
		$tabLinks->addAttribute('data-uk-tab', '{connect:"#' . $tabContainer->getTabs()->getId() . '"}');

		// Set the first one as active
		foreach ($tabLinks->getChildren() as $index => $link) {
			if ($index == 0) {
				$link->addClass('uk-active', true);
				break;
			}
		}

		// Set up the tab content
		$tabContainer->getTabs()->addClass('uk-switcher', true);
	}

	/**
	 *
	 * {@inheritdoc}
	 *
	 * @see \DPF\Content\Visitor\Basic\AbstractElementVisitorInterface::visitTable()
	 */
	public function visitTable(Table $table)
	{
		$table->addClass('uk-table', true);
		$table->addClass('uk-table-stripped', true);
	}
}

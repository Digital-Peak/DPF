<?php
/**
 * @package    DPF
 * @author     Digital Peak http://www.digital-peak.com
 * @copyright  Copyright (C) 2007 - 2016 Digital Peak. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl.html GNU/GPL
 */
namespace DPF\Content\Visitor\Basic;

/**
 * Abstract class which implements ElementVisitor.
 */
abstract class AbstractElementVisitor implements ElementVisitor
{

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\Basic\ElementVisitor::visitAlert()
	 */
	public function visitAlert(\DPF\Content\Element\Basic\Alert $alert)
	{}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\Basic\ElementVisitor::visitBadge()
	 */
	public function visitBadge(\DPF\Content\Element\Basic\Badge $badge)
	{}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\Basic\ElementVisitor::visitButton()
	 */
	public function visitButton(\DPF\Content\Element\Basic\Button $button)
	{}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\Basic\ElementVisitor::visitContainer()
	 */
	public function visitContainer(\DPF\Content\Element\Basic\Container $container)
	{}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\Basic\ElementVisitor::visitCustom()
	 */
	public function visitCustom(\DPF\Content\Element\Basic\Custom $custom)
	{}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\Basic\ElementVisitor::visitDescriptionDescription()
	 */
	public function visitDescriptionDescription(\DPF\Content\Element\Basic\Description\Description $descriptionDescription)
	{}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\Basic\ElementVisitor::visitDescriptionTerm()
	 */
	public function visitDescriptionTerm(\DPF\Content\Element\Basic\Description\Term $descriptionTerm)
	{}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\Basic\ElementVisitor::visitDescriptionList()
	 */
	public function visitDescriptionList(\DPF\Content\Element\Basic\DescriptionList $descriptionList)
	{}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\Basic\ElementVisitor::visitDescriptionListHorizontal()
	 */
	public function visitDescriptionListHorizontal(\DPF\Content\Element\Basic\DescriptionListHorizontal $descriptionListHorizontal)
	{}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\Basic\ElementVisitor::visitFont()
	 */
	public function visitFont(\DPF\Content\Element\Basic\Font $font)
	{}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\Basic\ElementVisitor::visitForm()
	 */
	public function visitForm(\DPF\Content\Element\Basic\Form $form)
	{}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\Basic\ElementVisitor::visitFormInput()
	 */
	public function visitFormInput(\DPF\Content\Element\Basic\Form\Input $formInput)
	{}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\Basic\ElementVisitor::visitFormLabel()
	 */
	public function visitFormLabel(\DPF\Content\Element\Basic\Form\Label $formLabel)
	{}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\Basic\ElementVisitor::visitFormSelect()
	 */
	public function visitFormSelect(\DPF\Content\Element\Basic\Form\Select $formSelect)
	{}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\Basic\ElementVisitor::visitGrid()
	 */
	public function visitGrid(\DPF\Content\Element\Basic\Grid $grid)
	{}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\Basic\ElementVisitor::visitGridColumn()
	 */
	public function visitGridColumn(\DPF\Content\Element\Basic\Grid\Column $gridColumn)
	{}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\Basic\ElementVisitor::visitGridRow()
	 */
	public function visitGridRow(\DPF\Content\Element\Basic\Grid\Row $gridRow)
	{}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\Basic\ElementVisitor::visitHeading()
	 */
	public function visitHeading(\DPF\Content\Element\Basic\Heading $heading)
	{}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\Basic\ElementVisitor::visitIcon()
	 */
	public function visitIcon(\DPF\Content\Element\Basic\Icon $icon)
	{}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\Basic\ElementVisitor::visitImage()
	 */
	public function visitImage(\DPF\Content\Element\Basic\Image $image)
	{}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\Basic\ElementVisitor::visitLink()
	 */
	public function visitLink(\DPF\Content\Element\Basic\Link $link)
	{}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\Basic\ElementVisitor::visitListContainer()
	 */
	public function visitListContainer(\DPF\Content\Element\Basic\ListContainer $listContainer)
	{}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\Basic\ElementVisitor::visitListItem()
	 */
	public function visitListItem(\DPF\Content\Element\Basic\ListItem $listItem)
	{}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\Basic\ElementVisitor::visitMeta()
	 */
	public function visitMeta(\DPF\Content\Element\Basic\Meta $meta)
	{}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\Basic\ElementVisitor::visitParagraph()
	 */
	public function visitParagraph(\DPF\Content\Element\Basic\Paragraph $paragraph)
	{}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\Basic\ElementVisitor::visitTab()
	 */
	public function visitTab(\DPF\Content\Element\Basic\Tab $tab)
	{}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\Basic\ElementVisitor::visitTabContainer()
	 */
	public function visitTabContainer(\DPF\Content\Element\Basic\TabContainer $tabContainer)
	{}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\Basic\ElementVisitor::visitTable()
	 */
	public function visitTable(\DPF\Content\Element\Basic\Table $table)
	{}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\Basic\ElementVisitor::visitTableCell()
	 */
	public function visitTableCell(\DPF\Content\Element\Basic\Table\Cell $tableCell)
	{}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\Basic\ElementVisitor::visitTableRow()
	 */
	public function visitTableRow(\DPF\Content\Element\Basic\Table\Row $tableRow)
	{}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\Basic\ElementVisitor::visitTextBlock()
	 */
	public function visitTextBlock(\DPF\Content\Element\Basic\TextBlock $textBlock)
	{}
}

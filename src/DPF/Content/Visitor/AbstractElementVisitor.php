<?php
/**
 * @package    DPF
 * @author     Digital Peak http://www.digital-peak.com
 * @copyright  Copyright (C) 2007 - 2016 Digital Peak. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl.html GNU/GPL
 */
namespace DPF\Content\Visitor;

/**
 * Abstract class which implements ElementVisitorInterface.
 */
abstract class AbstractElementVisitor implements ElementVisitorInterface
{

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\Content\Visitor\ElementVisitorInterface::visitAlert()
	 */
	public function visitAlert(\DPF\Content\Element\Component\Alert $alert)
	{
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\Content\Visitor\ElementVisitorInterface::visitBadge()
	 */
	public function visitBadge(\DPF\Content\Element\Component\Badge $badge)
	{
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\Content\Visitor\ElementVisitorInterface::visitButton()
	 */
	public function visitButton(\DPF\Content\Element\Basic\Button $button)
	{
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\Content\Visitor\ElementVisitorInterface::visitContainer()
	 */
	public function visitContainer(\DPF\Content\Element\Basic\Container $container)
	{
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\Content\Visitor\ElementVisitorInterface::visitDescriptionDescription()
	 */
	public function visitDescriptionDescription(\DPF\Content\Element\Basic\Description\Description $descriptionDescription)
	{
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\Content\Visitor\ElementVisitorInterface::visitDescriptionList()
	 */
	public function visitDescriptionList(\DPF\Content\Element\Basic\DescriptionList $descriptionList)
	{
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\Content\Visitor\ElementVisitorInterface::visitDescriptionListHorizontal()
	 */
	public function visitDescriptionListHorizontal(\DPF\Content\Element\Basic\DescriptionListHorizontal $descriptionListHorizontal)
	{
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\Content\Visitor\ElementVisitorInterface::visitDescriptionTerm()
	 */
	public function visitDescriptionTerm(\DPF\Content\Element\Basic\Description\Term $descriptionTerm)
	{
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\Content\Visitor\ElementVisitorInterface::visitElement()
	 */
	public function visitElement(\DPF\Content\Element\Basic\Element $element)
	{
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\Content\Visitor\ElementVisitorInterface::visitFacebookComment()
	 */
	public function visitFacebookComment(\DPF\Content\Element\Extension\FacebookComment $facebookComment)
	{
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\Content\Visitor\ElementVisitorInterface::visitFacebookLike()
	 */
	public function visitFacebookLike(\DPF\Content\Element\Extension\FacebookLike $facebookLike)
	{
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\Content\Visitor\ElementVisitorInterface::visitFont()
	 */
	public function visitFont(\DPF\Content\Element\Basic\Font $font)
	{
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\Content\Visitor\ElementVisitorInterface::visitForm()
	 */
	public function visitForm(\DPF\Content\Element\Basic\Form $form)
	{
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\Content\Visitor\ElementVisitorInterface::visitFormInput()
	 */
	public function visitFormInput(\DPF\Content\Element\Basic\Form\Input $formInput)
	{
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\Content\Visitor\ElementVisitorInterface::visitFormLabel()
	 */
	public function visitFormLabel(\DPF\Content\Element\Basic\Form\Label $formLabel)
	{
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\Content\Visitor\ElementVisitorInterface::visitFormOption()
	 */
	public function visitFormOption(\DPF\Content\Element\Basic\Form\Option $formOption)
	{
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\Content\Visitor\ElementVisitorInterface::visitFormSelect()
	 */
	public function visitFormSelect(\DPF\Content\Element\Basic\Form\Select $formSelect)
	{
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\Content\Visitor\ElementVisitorInterface::visitFrame()
	 */
	public function visitFrame(\DPF\Content\Element\Basic\Frame $frame)
	{
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\Content\Visitor\ElementVisitorInterface::visitGoogleLike()
	 */
	public function visitGoogleLike(\DPF\Content\Element\Extension\GoogleLike $googleLike)
	{
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\Content\Visitor\ElementVisitorInterface::visitGrid()
	 */
	public function visitGrid(\DPF\Content\Element\Component\Grid $grid)
	{
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\Content\Visitor\ElementVisitorInterface::visitGridColumn()
	 */
	public function visitGridColumn(\DPF\Content\Element\Component\Grid\Column $gridColumn)
	{
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\Content\Visitor\ElementVisitorInterface::visitGridRow()
	 */
	public function visitGridRow(\DPF\Content\Element\Component\Grid\Row $gridRow)
	{
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\Content\Visitor\ElementVisitorInterface::visitHeading()
	 */
	public function visitHeading(\DPF\Content\Element\Basic\Heading $heading)
	{
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\Content\Visitor\ElementVisitorInterface::visitIcon()
	 */
	public function visitIcon(\DPF\Content\Element\Component\Icon $icon)
	{
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\Content\Visitor\ElementVisitorInterface::visitImage()
	 */
	public function visitImage(\DPF\Content\Element\Basic\Image $image)
	{
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\Content\Visitor\ElementVisitorInterface::visitLink()
	 */
	public function visitLink(\DPF\Content\Element\Basic\Link $link)
	{
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\Content\Visitor\ElementVisitorInterface::visitLinkedInShare()
	 */
	public function visitLinkedInShare(\DPF\Content\Element\Extension\LinkedInShare $linkedInShare)
	{
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\Content\Visitor\ElementVisitorInterface::visitListContainer()
	 */
	public function visitListContainer(\DPF\Content\Element\Basic\ListContainer $listContainer)
	{
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\Content\Visitor\ElementVisitorInterface::visitListItem()
	 */
	public function visitListItem(\DPF\Content\Element\Basic\ListItem $listItem)
	{
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\Content\Visitor\ElementVisitorInterface::visitMeta()
	 */
	public function visitMeta(\DPF\Content\Element\Basic\Meta $meta)
	{
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\Content\Visitor\ElementVisitorInterface::visitParagraph()
	 */
	public function visitParagraph(\DPF\Content\Element\Basic\Paragraph $paragraph)
	{
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\Content\Visitor\ElementVisitorInterface::visitTab()
	 */
	public function visitTab(\DPF\Content\Element\Component\Tab $tab)
	{
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\Content\Visitor\ElementVisitorInterface::visitTabContainer()
	 */
	public function visitTabContainer(\DPF\Content\Element\Component\TabContainer $tabContainer)
	{
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\Content\Visitor\ElementVisitorInterface::visitTable()
	 */
	public function visitTable(\DPF\Content\Element\Basic\Table $table)
	{
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\Content\Visitor\ElementVisitorInterface::visitTableBody()
	 */
	public function visitTableBody(\DPF\Content\Element\Basic\Table\Body $tableBody)
	{
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\Content\Visitor\ElementVisitorInterface::visitTableCell()
	 */
	public function visitTableCell(\DPF\Content\Element\Basic\Table\Cell $tableCell)
	{
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\Content\Visitor\ElementVisitorInterface::visitTableFooter()
	 */
	public function visitTableFooter(\DPF\Content\Element\Basic\Table\Footer $tableFooter)
	{
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\Content\Visitor\ElementVisitorInterface::visitTableHead()
	 */
	public function visitTableHead(\DPF\Content\Element\Basic\Table\Head $tableHead)
	{
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\Content\Visitor\ElementVisitorInterface::visitTableHeadCell()
	 */
	public function visitTableHeadCell(\DPF\Content\Element\Basic\Table\HeadCell $tableHeadCell)
	{
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\Content\Visitor\ElementVisitorInterface::visitTableRow()
	 */
	public function visitTableRow(\DPF\Content\Element\Basic\Table\Row $tableRow)
	{
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\Content\Visitor\ElementVisitorInterface::visitTextBlock()
	 */
	public function visitTextBlock(\DPF\Content\Element\Basic\TextBlock $textBlock)
	{
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\Content\Visitor\ElementVisitorInterface::visitTwitterShare()
	 */
	public function visitTwitterShare(\DPF\Content\Element\Extension\TwitterShare $twitterShare)
	{
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\Content\Visitor\ElementVisitorInterface::visitXingShare()
	 */
	public function visitXingShare(\DPF\Content\Element\Extension\XingShare $xingShare)
	{
	}
}

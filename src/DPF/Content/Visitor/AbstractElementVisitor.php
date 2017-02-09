<?php
/**
 * @package    DPF
 * @author     Digital Peak http://www.digital-peak.com
 * @copyright  Copyright (C) 2007 - 2016 Digital Peak. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl.html GNU/GPL
 */
namespace DPF\Content\Visitor;

/**
 * Abstract class which implements ElementVisitor.
 */
abstract class AbstractElementVisitor implements ElementVisitorInterface
{

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\ElementVisitor::visitAlert()
	 */
	public function visitAlert(\DPF\Content\Element\Basic\Alert $alert)
	{
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\ElementVisitor::visitBadge()
	 */
	public function visitBadge(\DPF\Content\Element\Basic\Badge $badge)
	{
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\ElementVisitor::visitButton()
	 */
	public function visitButton(\DPF\Content\Element\Basic\Button $button)
	{
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\ElementVisitor::visitContainer()
	 */
	public function visitContainer(\DPF\Content\Element\Basic\Container $container)
	{
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\ElementVisitor::visitCustom()
	 */
	public function visitCustom(\DPF\Content\Element\Basic\Custom $custom)
	{
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\ElementVisitor::visitDescriptionDescription()
	 */
	public function visitDescriptionDescription(\DPF\Content\Element\Basic\Description\Description $descriptionDescription)
	{
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\ElementVisitor::visitDescriptionTerm()
	 */
	public function visitDescriptionTerm(\DPF\Content\Element\Basic\Description\Term $descriptionTerm)
	{
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\ElementVisitor::visitDescriptionList()
	 */
	public function visitDescriptionList(\DPF\Content\Element\Basic\DescriptionList $descriptionList)
	{
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\ElementVisitor::visitDescriptionListHorizontal()
	 */
	public function visitDescriptionListHorizontal(\DPF\Content\Element\Basic\DescriptionListHorizontal $descriptionListHorizontal)
	{
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\ElementVisitor::visitElement()
	 */
	public function visitElement(\DPF\Content\Element\Basic\Element $element)
	{
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\ElementVisitor::visitFont()
	 */
	public function visitFont(\DPF\Content\Element\Basic\Font $font)
	{
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\ElementVisitor::visitForm()
	 */
	public function visitForm(\DPF\Content\Element\Basic\Form $form)
	{
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\ElementVisitor::visitFormInput()
	 */
	public function visitFormInput(\DPF\Content\Element\Basic\Form\Input $formInput)
	{
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\ElementVisitor::visitFormLabel()
	 */
	public function visitFormLabel(\DPF\Content\Element\Basic\Form\Label $formLabel)
	{
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\ElementVisitor::visitFormSelect()
	 */
	public function visitFormSelect(\DPF\Content\Element\Basic\Form\Select $formSelect)
	{
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\ElementVisitor::visitGrid()
	 */
	public function visitGrid(\DPF\Content\Element\Basic\Grid $grid)
	{
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\ElementVisitor::visitGridColumn()
	 */
	public function visitGridColumn(\DPF\Content\Element\Basic\Grid\Column $gridColumn)
	{
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\ElementVisitor::visitGridRow()
	 */
	public function visitGridRow(\DPF\Content\Element\Basic\Grid\Row $gridRow)
	{
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\ElementVisitor::visitHeading()
	 */
	public function visitHeading(\DPF\Content\Element\Basic\Heading $heading)
	{
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\ElementVisitor::visitIcon()
	 */
	public function visitIcon(\DPF\Content\Element\Basic\Icon $icon)
	{
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\ElementVisitor::visitImage()
	 */
	public function visitImage(\DPF\Content\Element\Basic\Image $image)
	{
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\ElementVisitor::visitLink()
	 */
	public function visitLink(\DPF\Content\Element\Basic\Link $link)
	{
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\ElementVisitor::visitListContainer()
	 */
	public function visitListContainer(\DPF\Content\Element\Basic\ListContainer $listContainer)
	{
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\ElementVisitor::visitListItem()
	 */
	public function visitListItem(\DPF\Content\Element\Basic\ListItem $listItem)
	{
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\ElementVisitor::visitMeta()
	 */
	public function visitMeta(\DPF\Content\Element\Basic\Meta $meta)
	{
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\ElementVisitor::visitParagraph()
	 */
	public function visitParagraph(\DPF\Content\Element\Basic\Paragraph $paragraph)
	{
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\ElementVisitor::visitTab()
	 */
	public function visitTab(\DPF\Content\Element\Basic\Tab $tab)
	{
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\ElementVisitor::visitTabContainer()
	 */
	public function visitTabContainer(\DPF\Content\Element\Basic\TabContainer $tabContainer)
	{
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\ElementVisitor::visitTable()
	 */
	public function visitTable(\DPF\Content\Element\Basic\Table $table)
	{
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\ElementVisitor::visitTableCell()
	 */
	public function visitTableCell(\DPF\Content\Element\Basic\Table\Cell $tableCell)
	{
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\ElementVisitor::visitTableRow()
	 */
	public function visitTableRow(\DPF\Content\Element\Basic\Table\Row $tableRow)
	{
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\ElementVisitor::visitTextBlock()
	 */
	public function visitTextBlock(\DPF\Content\Element\Basic\TextBlock $textBlock)
	{
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\ElementVisitor::visitFacebookComments()
	 */
	public function visitFacebookComments(\DPF\Content\Element\Extension\FacebookComments $facebookComments)
	{
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\ElementVisitor::visitFacebookLike()
	 */
	public function visitFacebookLike(\DPF\Content\Element\Extension\FacebookLike $facebookLike)
	{
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\ElementVisitor::visitGoogleLike()
	 */
	public function visitGoogleLike(\DPF\Content\Element\Extension\GoogleLike $googleLike)
	{
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\ElementVisitor::visitLinkedInShare()
	 */
	public function visitLinkedInShare(\DPF\Content\Element\Extension\LinkedInShare $linkedInShare)
	{
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\ElementVisitor::visitTwitterShare()
	 */
	public function visitTwitterShare(\DPF\Content\Element\Extension\TwitterShare $twitterShare)
	{
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\ElementVisitor::visitXingShare()
	 */
	public function visitXingShare(\DPF\Content\Element\Extension\XingShare $xingShare)
	{
	}
}

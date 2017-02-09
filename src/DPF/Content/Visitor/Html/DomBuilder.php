<?php
/**
 * @package    DPF
 * @author     Digital Peak http://www.digital-peak.com
 * @copyright  Copyright (C) 2007 - 2016 Digital Peak. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl.html GNU/GPL
 */
namespace DPF\Content\Visitor\Html;

use DPF\Content\Element\Basic\Element;
use DPF\Content\Element\Basic\Container;
use DPF\Content\Visitor\ElementVisitorInterface;
use DPF\Content\Element\ElementInterface;
use DPF\Content\Element\Basic\ListContainer;

/**
 * Builds a dom from the element tree.
 */
class DomBuilder implements ElementVisitorInterface
{

	/**
	 * The dom document.
	 *
	 * @var \DOMDocument
	 */
	private $dom = null;

	public function __construct()
	{
		// Prepare the dom document
		$this->dom               = new \DOMDocument('1.0', 'UTF-8');
		$this->dom->formatOutput = true;
	}

	/**
	 * Renders the given element and returns a HTML string.
	 *
	 * @return string
	 *
	 * @throws \Exception
	 */
	public function render()
	{
		$handler = function ($errno, $errstr) {
			throw new \DOMException($errstr);
		};

		// Set a new handler
		$oldHandler = set_error_handler($handler);

		// Gather the output
		$output = trim($this->dom->saveHTML());

		// Set the old handler back
		set_error_handler($oldHandler);

		// Return the output
		return $output;
	}

	/**
	 * Builds the element as DOMElement with the defined tag.
	 *
	 * @param ElementInterface $element
	 * @param string $tagName
	 *
	 * @return \DOMNode
	 *
	 * @throws \DOMException
	 */
	protected function build(ElementInterface $element, $tagName = 'div')
	{
		// Determine the parent the element belongs to
		$parent = $this->dom;
		if ($element->getParent() != null) {
			$x = new \DOMXPath($this->dom);
			$parent = $x->query("//*[@id='" . $element->getParent()->getId() . "']")->item(0);
		}

		$root = $parent->appendChild($this->dom->createElement($tagName));

		// Set the attributes
		foreach ($element->getAttributes() as $name => $attr) {
			$attr = trim($attr);
			if ($attr == '' || $attr === null) {
				continue;
			}

			$root->setAttribute($name, $attr);
		}

		if ($element->getContent()) {
			if (strpos($element->getContent(), '<') >= 0) {
				$handler = function ($errno, $errstr, $errfile, $errline) use ($element) {
					throw new \DOMException($errstr . ' in file ' . $errfile . ' on line ' . $errline . PHP_EOL . htmlentities($element->getContent()));
				};
				$oldHandler = set_error_handler($handler);

				$fragment = $this->dom->createDocumentFragment();

				// If the content contains alrady cdata, then we assume it wil be valid at all
				if (strpos($element->getContent(), '<![CDATA[') !== false) {
					$fragment->appendXML($element->getContent());
				} else {
					$fragment->appendXML('<![CDATA[' . $element->getContent() . ']]>');
				}

				if ($fragment->childNodes->length > 0) {
					$root->appendChild($fragment);
				}

				set_error_handler($oldHandler);
			} else {
				$root->nodeValue = htmlspecialchars($element->getContent());
			}
		}
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\ElementVisitor::visitAlert()
	 */
	public function visitAlert(\DPF\Content\Element\Basic\Alert $alert)
	{
		$this->build($alert);
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\ElementVisitor::visitBadge()
	 */
	public function visitBadge(\DPF\Content\Element\Basic\Badge $badge)
	{
		$this->build($badge);
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\ElementVisitor::visitButton()
	 */
	public function visitButton(\DPF\Content\Element\Basic\Button $button)
	{
		$this->build($button, 'button');
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\ElementVisitor::visitContainer()
	 */
	public function visitContainer(\DPF\Content\Element\Basic\Container $container)
	{
		$this->build($container);
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\ElementVisitor::visitDescriptionDescription()
	 */
	public function visitDescriptionDescription(\DPF\Content\Element\Basic\Description\Description $descriptionDescription)
	{
		$this->build($descriptionDescription, 'dd');
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\ElementVisitor::visitDescriptionTerm()
	 */
	public function visitDescriptionTerm(\DPF\Content\Element\Basic\Description\Term $descriptionTerm)
	{
		$this->build($descriptionTerm, 'dt');
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\ElementVisitor::visitDescriptionList()
	 */
	public function visitDescriptionList(\DPF\Content\Element\Basic\DescriptionList $descriptionList)
	{
		$this->build($descriptionList, 'dl');
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\ElementVisitor::visitDescriptionListHorizontal()
	 */
	public function visitDescriptionListHorizontal(\DPF\Content\Element\Basic\DescriptionListHorizontal $descriptionListHorizontal)
	{
		$this->build($descriptionList, 'dl');
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\ElementVisitor::visitElement()
	 */
	public function visitElement(\DPF\Content\Element\Basic\Element $element)
	{
		$this->build($element);
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\ElementVisitor::visitFont()
	 */
	public function visitFont(\DPF\Content\Element\Basic\Font $font)
	{
		$this->build($descriptionList, 'font');
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\ElementVisitor::visitForm()
	 */
	public function visitForm(\DPF\Content\Element\Basic\Form $form)
	{
		$this->build($form, 'form');
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\ElementVisitor::visitFormInput()
	 */
	public function visitFormInput(\DPF\Content\Element\Basic\Form\Input $formInput)
	{
		$this->build($form, 'input');
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\ElementVisitor::visitFormLabel()
	 */
	public function visitFormLabel(\DPF\Content\Element\Basic\Form\Label $formLabel)
	{
		$this->build($form, 'label');
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\ElementVisitor::visitFormOption()
	 */
	public function visitFormOption(\DPF\Content\Element\Basic\Form\Option $formOption)
	{
		$this->build($form, 'option');
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\ElementVisitor::visitFormSelect()
	 */
	public function visitFormSelect(\DPF\Content\Element\Basic\Form\Select $formSelect)
	{
		$this->build($form, 'select');
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\ElementVisitor::visitGrid()
	 */
	public function visitGrid(\DPF\Content\Element\Basic\Grid $grid)
	{
		$this->build($grid);
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\ElementVisitor::visitGridColumn()
	 */
	public function visitGridColumn(\DPF\Content\Element\Basic\Grid\Column $gridColumn)
	{
		$this->build($gridColumn);
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\ElementVisitor::visitGridRow()
	 */
	public function visitGridRow(\DPF\Content\Element\Basic\Grid\Row $gridRow)
	{
		$this->build($gridRow);
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\ElementVisitor::visitHeading()
	 */
	public function visitHeading(\DPF\Content\Element\Basic\Heading $heading)
	{
		$this->build($heading, 'h' . $heading->getSize());
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\ElementVisitor::visitIcon()
	 */
	public function visitIcon(\DPF\Content\Element\Basic\Icon $icon)
	{
		$this->build($icon, 'i');
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\ElementVisitor::visitImage()
	 */
	public function visitImage(\DPF\Content\Element\Basic\Image $image)
	{
		$this->build($image, 'img');
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\ElementVisitor::visitLink()
	 */
	public function visitLink(\DPF\Content\Element\Basic\Link $link)
	{
		$this->build($image, 'a');
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\ElementVisitor::visitListContainer()
	 */
	public function visitListContainer(\DPF\Content\Element\Basic\ListContainer $listContainer)
	{
		$this->build($listContainer, $listContainer->getType() == ListContainer::UNORDERED ? 'ul' : 'ol');
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\ElementVisitor::visitListItem()
	 */
	public function visitListItem(\DPF\Content\Element\Basic\ListItem $listItem)
	{
		$this->build($listItem, 'li');
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\ElementVisitor::visitMeta()
	 */
	public function visitMeta(\DPF\Content\Element\Basic\Meta $meta)
	{
		$this->build($meta, 'meta');
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\ElementVisitor::visitParagraph()
	 */
	public function visitParagraph(\DPF\Content\Element\Basic\Paragraph $paragraph)
	{
		$this->build($paragraph, 'p');
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\ElementVisitor::visitTab()
	 */
	public function visitTab(\DPF\Content\Element\Basic\Tab $tab)
	{
		$this->build($tab);
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\ElementVisitor::visitTabContainer()
	 */
	public function visitTabContainer(\DPF\Content\Element\Basic\TabContainer $tabContainer)
	{
		$this->build($tabContainer);
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\ElementVisitor::visitTable()
	 */
	public function visitTable(\DPF\Content\Element\Basic\Table $table)
	{
		$this->build($table, 'table');
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\ElementVisitor::visitTableCell()
	 */
	public function visitTableCell(\DPF\Content\Element\Basic\Table\Cell $tableCell)
	{
		$this->build($tableCell, 'td');
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\ElementVisitor::visitTableRow()
	 */
	public function visitTableRow(\DPF\Content\Element\Basic\Table\Row $tableRow)
	{
		$this->build($tableRow, 'tr');
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\ElementVisitor::visitTextBlock()
	 */
	public function visitTextBlock(\DPF\Content\Element\Basic\TextBlock $textBlock)
	{
		$this->build($textBlock, 'span');
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\ElementVisitor::visitFacebookComments()
	 */
	public function visitFacebookComments(\DPF\Content\Element\Extension\FacebookComments $facebookComments)
	{
		$this->build($facebookComments);
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\ElementVisitor::visitFacebookLike()
	 */
	public function visitFacebookLike(\DPF\Content\Element\Extension\FacebookLike $facebookLike)
	{
		$this->build($facebookLike);
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\ElementVisitor::visitGoogleLike()
	 */
	public function visitGoogleLike(\DPF\Content\Element\Extension\GoogleLike $googleLike)
	{
		$this->build($googleLike);
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\ElementVisitor::visitLinkedInShare()
	 */
	public function visitLinkedInShare(\DPF\Content\Element\Extension\LinkedInShare $linkedInShare)
	{
		$this->build($linkedInShare);
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\ElementVisitor::visitTwitterShare()
	 */
	public function visitTwitterShare(\DPF\Content\Element\Extension\TwitterShare $twitterShare)
	{
		$this->build($twitterShare);
	}

	/**
	 * {@inheritdoc}
	 *
	 * @see \DPF\DPF\Content\Visitor\ElementVisitor::visitXingShare()
	 */
	public function visitXingShare(\DPF\Content\Element\Extension\XingShare $xingShare)
	{
		$this->build($xingShare);
	}
}

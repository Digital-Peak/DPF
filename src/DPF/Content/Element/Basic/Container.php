<?php
/**
 * @package    DPF
 * @author     Digital Peak http://www.digital-peak.com
 * @copyright  Copyright (C) 2007 - 2016 Digital Peak. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl.html GNU/GPL
 */
namespace DPF\Content\Element\Basic;


use DPF\Content\Framework;

/**
 * A container element which can hold child elements.
 */
class Container extends AbstractElement
{

	/**
	 * The children of this container.
	 *
	 * @var Element[]
	 */
	private $children = array();

	/**
	 *
	 * {@inheritdoc}
	 *
	 * @see Element::setContent()
	 */
	public function setContent($content, $append = false)
	{
		if ($content instanceof Element) {
			$content = [
				$content
			];
		}

		if (is_array($content)) {
			foreach ($content as $item) {
				if (! ($item instanceof Element)) {
					// If one item is not an element, we don't know what to do'
					break;
				}
				$this->addChild($item);
			}
			return $this;
		}

		return parent::setContent($content, $append);
	}

	/**
	 * Adds the given element as child to itself.
	 * It also sets the parent of the given element to this container.
	 *
	 * @param Element $element
	 *
	 * @return Element
	 */
	public function addChild(Element $element)
	{
		$element->setParent($this);
		$this->children[] = $element;

		return $element;
	}

	/**
	 *
	 * @return Element[]
	 */
	public function getChildren()
	{
		return $this->children;
	}

	public function build(\DOMElement $parent = null, Framework $framework = null)
	{
		$root = parent::build($parent, $framework);

		foreach ($this->getChildren() as $child) {
			$child->build($root, $framework);
		}

		return $root;
	}

	/**
	 *
	 * {@inheritdoc}
	 *
	 * @see Element::__toString()
	 */
	public function __toString()
	{
		$buffer = $this->getId() . PHP_EOL;

		foreach ($this->getChildren() as $child) {
			$buffer .= "\t" . $child . PHP_EOL;
		}

		return $buffer;
	}
}

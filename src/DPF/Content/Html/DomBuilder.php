<?php
/**
 * @package    DPF
 * @author     Digital Peak http://www.digital-peak.com
 * @copyright  Copyright (C) 2007 - 2016 Digital Peak. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl.html GNU/GPL
 */
namespace DPF\Content\Html;

use DPF\Content\Element\Basic\Element;
use DPF\Content\Element\Basic\Container;

/**
 * Builds a dom from the element tree.
 */
class DomBuilder
{
	/**
	 * Renders itself and returns a HTML string.
	 *
	 * @return string
	 *
	 * @throws \Exception
	 */
	public function render(Element $element)
	{
		$handler = function ($errno, $errstr) {
			throw new \DOMException($errstr);
		};

		// Set a new handler
		$oldHandler = set_error_handler($handler);

		$dom               = new \DOMDocument('1.0', 'UTF-8');
		$dom->formatOutput = true;

		// Build the dom
		$this->build($element, $dom);

		// Gather the output
		$output = trim($dom->saveHTML());

		// Set the old handler back
		set_error_handler($oldHandler);

		// Return the output
		return $output;
	}

	/**
	 * Builds the element as DOMElement under the given parent.
	 *
	 * @param \DOMNode $parent
	 *
	 * @return \DOMNode
	 *
	 * @throws \DOMException
	 */
	private function build(Element $element, \DOMNode $parent)
	{
		// Prepare the domdocument
		$dom = $parent;
		if ($parent instanceof \DOMElement) {
			$dom = $parent->ownerDocument;
		}

		// Create the root element
		$domElement = $dom->createElement($element->getTagName());

		$root = $parent->appendChild($domElement);

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

				$fragment = $dom->createDocumentFragment();

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

		if($element instanceof Container)
		{
			foreach ($element->getChildren() as $child) {
				$this->build($child, $root);
			}
		}
	}

}

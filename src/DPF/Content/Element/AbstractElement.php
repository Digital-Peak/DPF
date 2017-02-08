<?php
/**
 * @package    DPF
 * @author     Digital Peak http://www.digital-peak.com
 * @copyright  Copyright (C) 2007 - 2016 Digital Peak. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl.html GNU/GPL
 */
namespace DPF\Content\Element;

use DPF\Content\Visitor\Basic\ElementVisitor;
use DPF\Content\Element\Basic\Element;

/**
 * An element represents a node in an HTML tree.
 */
abstract class AbstractElement implements ElementInterface
{

	/**
	 * The id of the element
	 *
	 * @var string
	 */
	private $id = '';

	/**
	 * The classes of the element.
	 *
	 * @var array
	 */
	private $classes = array();

	/**
	 * The attributes of the element.
	 * The key is the name and the value the value.
	 *
	 * @var array
	 */
	private $attributes = array();

	/**
	 * The content of the element
	 *
	 * @var string
	 */
	private $content = '';

	/**
	 * Some protected class names which will not being prefixed.
	 *
	 * @var array
	 */
	private $protectedClasses = array();

	/**
	 * The parent.
	 *
	 * @var \DPF\Content\Element\Basic\Container
	 */
	private $parent = null;

	/**
	 * Defines the internal attributes structure with the given parameters.
	 *
	 * @param string $id
	 * @param array $classes
	 * @param array $attributes
	 *
	 * @throws \Exception
	 */
	public function __construct($id, array $classes = [], array $attributes = [])
	{
		if (! $id) {
			throw new \Exception('ID cannot be empty!');
		}

		$this->id = $id;
		$this->classes = $classes;
		$this->attributes = $attributes;
	}

	/**
	 * The tag name of the element.
	 *
	 * @return string
	 */
	public abstract function getTagName();

	/**
	 * Renders itself and returns a HTML string.
	 *
	 * @return string
	 *
	 * @throws \Exception
	 */
	public function render(Framework $framework = null)
	{
		$handler = function ($errno, $errstr) {
			throw new \DOMException($errstr);
		};
		$oldHandler = set_error_handler($handler);
		return trim($this->build(null)->ownerDocument->saveHTML());
		set_error_handler($oldHandler);
	}

	/**
	 * Returns the id of the element.
	 *
	 * @return string
	 */
	public function getId()
	{
		return $this->getParent() ? $this->getParent()->getId() . '-' . $this->id : $this->id;
	}

	/**
	 * Returns the classes of the element.
	 *
	 * @return array[string]
	 */
	public function getClasses()
	{
		return $this->classes;
	}

	/**
	 * Sets the given class as protected.
	 * This means when a prefix is set, the class will not being prefixed.
	 *
	 * @param string $class
	 *
	 * @return Element
	 */
	public function setProtectedClass($class)
	{
		$this->protectedClasses[] = $class;

		return $this;
	}

	/**
	 * Adds the given class to the internal class variable.
	 *
	 * @param string $class
	 * @param boolean $protected
	 *
	 * @return Element
	 */
	public function addClass($class, $protected = false)
	{
		$this->classes[] = $class;

		if ($protected) {
			$this->setProtectedClass($class);
		}

		return $this;
	}

	/**
	 * Adds a new attribute for the given name.
	 *
	 * @param string $name
	 * @param string $value
	 *
	 * @return Element
	 */
	public function addAttribute($name, $value)
	{
		$this->attributes[$name] = $value;

		return $this;
	}

	/**
	 * Returns the attributes of the element.
	 * If prefix is set to true, then all classes which are not protected, are prefixed.
	 *
	 * @param boolean $prefixClasses
	 *
	 * @return string
	 *
	 * @see Element::getPrefix
	 * @see Element::setProtectedClass
	 */
	public function getAttributes($prefixClasses = false)
	{
		$attributes = $this->attributes;

		$prefix = null;
		if (key_exists('dpf-prefix', $attributes)) {
			unset($attributes['dpf-prefix']);
		}

		foreach ($this->classes as $class) {
			$class = trim($class);

			// Empty class is ignored
			if (! $class) {
				continue;
			}

			if (! key_exists('class', $attributes)) {
				$attributes['class'] = '';
			}

			if ($prefixClasses && ! in_array($class, $this->protectedClasses) && $this->getPrefix()) {
				$class = $this->getPrefix() . $class;
			}
			$attributes['class'] .= $class . ' ';
		}

		$attributes['id'] = $this->getId();
		return $attributes;
	}

	/**
	 * Returns the prefix of the element.
	 * If none is set, then it traverses the parents up, till one get found.
	 *
	 * @return string
	 */
	public function getPrefix()
	{
		$prefix = '';
		if (key_exists('dpf-prefix', $this->attributes)) {
			$prefix = $this->attributes['dpf-prefix'];
		}

		if (! $prefix && $this->parent) {
			return $this->parent->getPrefix();
		}
		return $prefix;
	}

	/**
	 * Returns the content of the element.
	 *
	 * @return string
	 */
	public function getContent()
	{
		return $this->content;
	}

	/**
	 * Returns the parent of the element.
	 *
	 * @return Element
	 */
	public function getParent()
	{
		return $this->parent;
	}

	/**
	 * Sets the parent of the element.
	 *
	 * @param Element $parent
	 *
	 * @return Element
	 *
	 */
	public function setParent(Element $parent)
	{
		$this->parent = $parent;

		return $this;
	}

	/**
	 * Sets the content for the element.
	 * If append is set to true, the existing content will not being touched. If the content is invalid XML, an exception is thrown.
	 *
	 * @param string $content
	 * @param boolean $append
	 *
	 * @return Element
	 *
	 * @throws \Exception
	 */
	public function setContent($content, $append = false)
	{
		$content = ($append ? $this->content : '') . $content;

		if ($content === '' || $content === null) {
			return $this;
		}

		$this->content = $content;

		return $this;
	}

	/**
	 * Builds the element as DOMElement under the given parent.
	 *
	 * @param \DOMElement $parent
	 *
	 * @return \DOMNode
	 *
	 * @throws \DOMException
	 */
	public function build(\DOMElement $parent = null)
	{
		// Prepare the domdocument
		$dom = new \DOMDocument('1.0', 'UTF-8');
		if ($parent != null) {
			$dom = $parent->ownerDocument;
		}
		$dom->formatOutput = true;

		// Create the root element
		$domElement = $dom->createElement($this->getTagName());

		if ($parent == null) {
			$parent = $dom;
		}

		$root = $parent->appendChild($domElement);

		// Set the attributes
		foreach ($this->getAttributes(true) as $name => $attr) {
			$attr = trim($attr);
			if ($attr == '' || $attr === null) {
				continue;
			}

			$root->setAttribute($name, $attr);
		}

		if ($this->getContent()) {
			if (strpos($this->getContent(), '<') >= 0) {
				$instance = $this;
				$handler = function ($errno, $errstr, $errfile, $errline) use ($instance) {
					throw new \DOMException($errstr . ' in file ' . $errfile . ' on line ' . $errline . PHP_EOL . htmlentities($this->getContent()));
				};
				$oldHandler = set_error_handler($handler);

				$fragment = $dom->createDocumentFragment();

				// If the content contains alrady cdata, then we assume it wil be valid at all
				if (strpos($this->getContent(), '<![CDATA[') !== false) {
					$fragment->appendXML($this->getContent());
				} else {
					$fragment->appendXML('<![CDATA[' . $this->getContent() . ']]>');
				}

				if ($fragment->childNodes->length > 0) {
					$root->appendChild($fragment);
				}

				set_error_handler($oldHandler);
			} else {
				$root->nodeValue = htmlspecialchars($this->getContent());
			}
		}
		return $root;
	}

	/**
	 * Returns a string for the element.
	 *
	 * @return string
	 */
	public function __toString()
	{
		return $this->getId() . ' [' . get_class($this) . ']';
	}

	/**
	 *
	 * @param ElementVisitor $visitor
	 */
	public function accept(ElementVisitor $visitor)
	{
		$name = str_replace(__NAMESPACE__ . '\\Basic\\', '', get_class($this));
		$name = 'visit' . str_replace('\\', '', $name);

		if (!method_exists($visitor, $name))
		{
			return;
		}

		$visitor->{$name}($this);
	}
}

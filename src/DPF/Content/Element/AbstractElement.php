<?php
/**
 * @package    DPF
 * @author     Digital Peak http://www.digital-peak.com
 * @copyright  Copyright (C) 2007 - 2016 Digital Peak. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl.html GNU/GPL
 */
namespace DPF\Content\Element;

use DPF\Content\Visitor\ElementVisitorInterface;
use DPF\Content\Element\Basic\Element;
use DPF\Content\Element\Basic\Container;

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

		$this->id         = $id;
		$this->classes    = $classes;
		$this->attributes = $attributes;
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
	 * Sets the given class as protected. This means when a prefix is set, the class will not being prefixed.
	 *
	 * @param string $class
	 *
	 * @return AbstractElement
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
	 * @return AbstractElement
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
	 * @return AbstractElement
	 */
	public function addAttribute($name, $value)
	{
		$this->attributes[$name] = $value;

		return $this;
	}

	/**
	 * {@inheritDoc}
	 *
	 * @see \DPF\Content\Element\ElementInterface::getAttributes()
	 */
	public function getAttributes()
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

			if (! in_array($class, $this->protectedClasses) && $this->getPrefix()) {
				$class = $this->getPrefix() . $class;
			}
			$attributes['class'] .= $class . ' ';
		}

		if (key_exists('class', $attributes)) {
			$attributes['class'] = trim($attributes['class']);
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
	 * {@inheritDoc}
	 *
	 * @see \DPF\Content\Element\ElementInterface::getContent()
	 */
	public function getContent()
	{
		return $this->content;
	}

	/**
	 * Sets the content for the element.
	 * If append is set to true, the existing content will not being touched. If the content is invalid XML, an exception is thrown.
	 *
	 * @param string $content
	 * @param boolean $append
	 *
	 * @return AbstractElement
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
	 * Returns the parent of the element.
	 *
	 * @return \DPF\Content\Element\ElementInterface
	 */
	public function getParent()
	{
		return $this->parent;
	}

	/**
	 * Sets the parent of the element.
	 *
	 * @param \DPF\Content\Element\ElementInterface $parent
	 *
	 * @return AbstractElement
	 */
	public function setParent(ElementInterface $parent)
	{
		$this->parent = $parent;

		return $this;
	}

	/**
	 * {@inheritDoc}
	 *
	 * @see \DPF\Content\Element\ElementInterface::accept()
	 */
	public function accept(ElementVisitorInterface $visitor)
	{
		$name = str_replace(__NAMESPACE__ . '\\Basic\\', '', get_class($this));
		$name = 'visit' . str_replace('\\', '', $name);

		if (!method_exists($visitor, $name))
		{
			return;
		}

		$visitor->{$name}($this);
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
}

<?php
/**
 * @package    DPF
 * @author     Digital Peak http://www.digital-peak.com
 * @copyright  Copyright (C) 2007 - 2016 Digital Peak. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl.html GNU/GPL
 */
namespace DPF\Content;

use DPF\Content\Element\Basic\Container;

class Element
{

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
	 * The prefix.
	 *
	 * @var string
	 */
	private $prefix = '';

	/**
	 * The parent.
	 *
	 * @var Container
	 */
	private $parent = null;

	public function __construct($id, array $classes = [], array $attributes = [])
	{
		if (! $id) {
			throw new \Exception('ID cannot be empty!');
		}

		if (key_exists('dpf-prefix', $attributes)) {
			$this->prefix = $attributes['dpf-prefix'];
			unset($attributes['dpf-prefix']);
		}

		$this->attributes = $attributes;

		$this->attributes['id'] = $id;
		$this->attributes['class'] = implode(' ', $classes);
	}

	public function render(Framework $framework = null)
	{
		return $this->build(null, $framework)->ownerDocument->saveHTML();
	}

	public function getId()
	{
		return $this->attributes['id'];
	}

	public function getClasses()
	{
		return explode(' ', $this->attributes['class']);
	}

	public function setProtectClass($class)
	{
		$this->protectedClasses[] = $class;

		return $this;
	}

	public function getAttributes($prefix = false)
	{
		$attributes = $this->attributes;
		if ($prefix) {
			foreach ($attributes as $key => $attribute) {
				$attributes[$key] = $this->getPrefixedAttribute($key, $attribute);
			}
		}
		return $attributes;
	}

	public function getPrefix()
	{
		if (! $this->prefix && $this->parent) {
			return $this->parent->getPrefix();
		}
		return $this->prefix;
	}

	public function getContent()
	{
		return $this->content;
	}

	public function setParent(Container $parent)
	{
		$this->parent = $parent;
	}

	/**
	 *
	 * @param string $content
	 * @param boolean $append
	 * @return \DPF\Content\Element
	 */
	public function setContent($content, $append = false)
	{
		$content = trim($content);
		$this->content = ($append ? $this->content : '') . $content;

		return $this;
	}

	public function build(\DOMElement $parent = null, Framework $framework = null)
	{
		// Prepare the domdocument
		$dom = new \DOMDocument();
		if ($parent != null) {
			$dom = $parent->ownerDocument;
		}
		$dom->formatOutput = true;

		$instance = $this;
		if ($framework && $override = $framework->getElement($this)) {
			$instance = $override;
		}

		// Create the root element
		$domElement = $dom->createElement($instance->getTagName());

		if ($parent == null) {
			$parent = $dom;
		}

		$root = $parent->appendChild($domElement);

		// Set the attributes
		foreach ($instance->getAttributes(true) as $name => $attr) {
			$root->setAttribute($name, $attr);
		}

		if ($instance->getContent()) {
			if (strpos($instance->getContent(), '<') === 0) {
				$handler = function ($errno, $errstr) {
					throw new \DOMException($errstr);
				};
				$oldHandler = set_error_handler($handler);

				$fragment = $dom->createDocumentFragment();
				$fragment->appendXML($instance->getContent());

				if ($fragment->childNodes->length > 0) {
					$root->appendChild($fragment);
				}

				set_error_handler($oldHandler);
			} else {
				$root->textContent = $instance->getContent();
			}
		}
		return $root;
	}

	protected function getTagName()
	{
		return 'div';
	}

	protected function canPrefix($name, $value)
	{
		if ($name == 'class') {
			// Is the value protected
			return ! in_array($value, $this->protectedClasses);
		}
		return $name == 'id';
	}

	private function getPrefixedAttribute($name, $value)
	{
		$prefix = $this->getPrefix();

		// When we don't have a prefix, retunr the value
		if (! $prefix) {
			return trim($value);
		}

		// Ensure array
		if (! is_array($value)) {
			$value = explode(' ', $value);
		}

		// Only unique values are allowed
		$value = array_unique($value);

		$tmp = '';
		foreach ($value as $v) {
			$v = trim($v);

			// Empty values are ignored
			if (! $v) {
				continue;
			}

			if (strpos($v, $prefix) === 0 || ! $this->canPrefix($name, $v)) {
				// Has prefix already or can't be prefixed
				$tmp .= $v . ' ';
				continue;
			}

			// Prefix the value
			$tmp .= $prefix . $v . ' ';
		}
		return trim($tmp);
	}
}

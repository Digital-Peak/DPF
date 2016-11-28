<?php
/**
 * @package    DPF
 * @author     Digital Peak http://www.digital-peak.com
 * @copyright  Copyright (C) 2007 - 2016 Digital Peak. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl.html GNU/GPL
 */
namespace DPF\Content;

class Element
{

    protected $attributes = null;

    private $content = '';

    /**
     *
     * @var Framework
     */
    private $framework = null;

    /**
     *
     * @var \DOMElement
     */
    private $root = null;

    public function __construct($id, array $classes = array(), array $attributes = array())
    {
        if (! $id) {
            throw new \Exception('ID cannot be empty!');
        }

        $this->attributes = $attributes;

        $this->setAttribute('id', $id);
        $this->setAttribute('class', implode(' ', $classes));
    }

    public function render()
    {
        if ($this->framework) {
            $override = $this->framework->getElement($this);
            if ($override) {
                return $override->render();
            }
        }

        return $this->getRoot()->ownerDocument->saveHTML();
    }

    public function appendContent($content)
    {
        $this->content .= $content;
        $this->build($this->root->parentNode);
    }

    public function setFramework(Framework $framework)
    {
        $this->framework = $framework;
    }

    protected function getRoot()
    {
        if ($this->root == null) {
            $this->build();
        }
        return $this->root;
    }

    protected function build(\DOMElement $parent = null)
    {
        // Prepare the domdocument
        $dom = null;
        if ($parent != null) {
            $dom = $parent->ownerDocument;
        } else {
            $dom = new \DOMDocument();
            $dom->formatOutput = true;
        }

        // Create the root element
        $domElement = $dom->createElement($this->getTagName());

        if ($parent == null) {
            $parent = $dom;
        }

        if ($this->root != null && isset($this->root->ownerDocument)) {
            $this->root->parentNode->removeChild($this->root);
        }
        $this->root = $parent->appendChild($domElement);

        // Set the attributes
        foreach ($this->attributes as $name => $attr) {
            if ($name == 'dpf-prefix' || ! $attr) {
                continue;
            }
            $this->root->setAttribute($name, $attr);
        }

        if ($this->content) {
            $this->root->textContent = $this->content;
        }
        return $this->root;
    }

    protected function getTagName()
    {
        return 'div';
    }

    protected function setAttribute($name, $value)
    {
        $prefix = key_exists('dpf-prefix', $this->attributes) ? $this->attributes['dpf-prefix'] : '';
        if ($prefix) {
            $tmp = '';
            foreach (explode(' ', $value) as $v) {
                if (strpos($v, $prefix) === 0 || ! $v) {
                    // Has prefix already
                    continue;
                }
                $tmp .= ($this->canPrefix($name, $v) ? $prefix : '') . $v . ' ';
            }
            $value = $tmp;
        }
        $this->attributes[$name] = trim($value);

        return $this->attributes[$name];
    }

    protected function canPrefix($name, $value)
    {
        return $name == 'class' || $name == 'id';
    }
}

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
        return $this->build()->ownerDocument->saveHTML();
    }

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function getClasses()
    {
        return explode(' ', $this->attributes['class']);
    }

    public function getAttributes()
    {
        return $this->attributes;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content, $append = false)
    {
        $this->content = ($append ? $this->content : '') . $content;

        return $this;
    }

    /**
     *
     * @return \DPF\Content\Framework
     */
    public function getFramework()
    {
        return $this->framework;
    }

    public function setFramework(Framework $framework = null)
    {
        $this->framework = $framework;

        return $this;
    }

    protected function build(\DOMElement $parent = null)
    {
        // Prepare the domdocument
        $dom = new \DOMDocument();
        if ($parent != null) {
            $dom = $parent->ownerDocument;
        }
        $dom->formatOutput = true;

        $instance = $this;
        if ($this->framework && $override = $this->framework->getElement($this)) {
            $instance = $override;
        }

        // Create the root element
        $domElement = $dom->createElement($instance->getTagName());

        if ($parent == null) {
            $parent = $dom;
        }

        $root = $parent->appendChild($domElement);

        // Set the attributes
        foreach ($instance->getAttributes() as $name => $attr) {
            if ($name == 'dpf-prefix' || ! $attr) {
                continue;
            }
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

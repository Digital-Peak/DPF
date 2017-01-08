<?php
/**
 * @package    DPF
 * @author     Digital Peak http://www.digital-peak.com
 * @copyright  Copyright (C) 2007 - 2016 Digital Peak. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl.html GNU/GPL
 */
namespace DPF\Content\Element\Basic;

use DPF\Content\Element;
use DPF\Content\Framework;

class Container extends Element
{

    private $children = array();

    /**
     *
     * @param Element|string $content
     * @param boolean $append
     * @return \DPF\Content\Element
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
     *
     * @param Element $element
     * @return \DPF\Content\Element
     */
    public function addChild(Element $element)
    {
        $this->checkPrefix($element);

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

        foreach ($this->children as $child) {
            $child->build($root, $framework);
        }

        return $root;
    }

    protected function checkPrefix(Element $element)
    {
        if (key_exists('dpf-prefix', $this->attributes) && ! key_exists('dpf-prefix', $element->attributes)) {
            // Set the prefix
            $element->attributes['dpf-prefix'] = $this->attributes['dpf-prefix'];
        }

        if ($element instanceof Container) {
            foreach ($element->children as $child) {
                $element->checkPrefix($child);
            }
        }
    }
}

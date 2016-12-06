<?php
/**
 * @package    DPF
 * @author     Digital Peak http://www.digital-peak.com
 * @copyright  Copyright (C) 2007 - 2016 Digital Peak. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl.html GNU/GPL
 */
namespace DPF\Content\Element;

use DPF\Content\Element;

class Container extends Element
{

    private $children = array();

    /**
     *
     * @param Element $element
     * @return \DPF\Content\Element
     */
    public function addChild(Element $element)
    {
        $this->checkPrefix($element);
        $this->children[] = $element;

        $element->build($this->getRoot());
        return $element;
    }

    protected function build(\DOMElement $parent = null)
    {
        $root = parent::build($parent);

        foreach ($this->children as $child) {
            $child->build($root);
        }

        return $root;
    }

    protected function checkPrefix(Element $element)
    {
        if (key_exists('dpf-prefix', $this->attributes) && ! key_exists('dpf-prefix', $element->attributes)) {

            // Prefix class and id attribute
            $element->attributes['dpf-prefix'] = $this->attributes['dpf-prefix'];
            foreach ($element->attributes as $name => $attr) {
                switch ($name) {
                    case 'id':
                    case 'class':
                        $element->setAttribute($name, $attr);
                        break;
                }
            }
        }

        if ($element instanceof Container) {
            foreach ($element->children as $child) {
                $element->checkPrefix($child);
            }
        }
    }
}

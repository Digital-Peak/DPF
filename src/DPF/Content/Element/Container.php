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

    public function addChild(Element $element)
    {
        $this->children[] = $element;
    }

    public function prepare($tagName = 'div')
    {
        $buffer = $this->createOpeningTag($tagName);
        $buffer .= $this->getContent();

        foreach ($this->children as $child) {
            $buffer .= $child->render();
        }

        $buffer .= $this->createClosingTag($tagName);

        return $buffer;
    }
}

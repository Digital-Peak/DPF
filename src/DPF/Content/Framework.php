<?php
/**
 * @package    DPF
 * @author     Digital Peak http://www.digital-peak.com
 * @copyright  Copyright (C) 2007 - 2016 Digital Peak. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl.html GNU/GPL
 */
namespace DPF\Content;

class Framework
{

    private $overrides = array();

    /**
     *
     * @return Element
     */
    public function getElement(Element $element)
    {
        $className = get_class($element);
        if (key_exists($className, $this->overrides)) {
            return call_user_func($this->overrides[$className], $element);
        }

        return null;
    }

    public function addOverride($className, callable $callback)
    {
        $this->overrides[$className] = $callback;
    }
}

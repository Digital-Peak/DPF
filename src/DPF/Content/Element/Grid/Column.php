<?php
/**
 * @package    DPF
 * @author     Digital Peak http://www.digital-peak.com
 * @copyright  Copyright (C) 2007 - 2016 Digital Peak. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl.html GNU/GPL
 */
namespace DPF\Content\Element\Grid;

use DPF\Content\Element\Container;

class Column extends Container
{

    public function __construct($id, $width, array $classes = array(), array $attributes = array())
    {
        $classes[] = 'dpf-col-' . $width;

        parent::__construct($id, $classes, $attributes);
    }

    protected function canPrefix($name, $value)
    {
        return strpos($value, 'dpf-col-') !== 0 && parent::canPrefix($name, $value);
    }
}

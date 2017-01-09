<?php
/**
 * @package    DPF
 * @author     Digital Peak http://www.digital-peak.com
 * @copyright  Copyright (C) 2007 - 2016 Digital Peak. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl.html GNU/GPL
 */
namespace DPF\Content\Element\Basic\Grid;

use DPF\Content\Element\Basic\Container;

class Column extends Container
{

    protected $COL_CLASS = "dpf-col-";

    private $width = 0;

    public function __construct($id, $width, array $classes = [], array $attributes = [])
    {
        $classes[] = $this->COL_CLASS . $width;
        $this->setProtectedClass($this->COL_CLASS . $width);

        parent::__construct($id, $classes, $attributes);

        $this->width = $width;
    }

    public function getWidth()
    {
        return $this->width;
    }
}

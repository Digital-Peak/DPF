<?php
/**
 * @package    DPF
 * @author     Digital Peak http://www.digital-peak.com
 * @copyright  Copyright (C) 2007 - 2016 Digital Peak. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl.html GNU/GPL
 */
namespace DPF\Content\Framework\BS2\Element;

use DPF\Content\Element;
use DPF\Content\Element\DescriptionList as OriginalDescriptionList;

class DescriptionList extends OriginalDescriptionList
{

    public function __construct($id, array $classes = array(), array $attributes = array())
    {
        $classes[] = 'dl-horizontal';

        parent::__construct($id, $classes, $attributes);
    }

    protected function canPrefix($name, $value)
    {
        return $value != 'dl-horizontal' && parent::canPrefix($name, $value);
    }
}

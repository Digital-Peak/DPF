<?php
/**
 * @package    DPF
 * @author     Digital Peak http://www.digital-peak.com
 * @copyright  Copyright (C) 2007 - 2016 Digital Peak. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl.html GNU/GPL
 */
namespace DPF\Content\IconStrategy;

use DPF\Content\Element\Basic\Icon;
use DPF\Content\IconStrategy;

class Joomla extends IconStrategy
{

    public function __construct()
    {
        $this->setIconClass(Icon::PLUS, 'icon-plus');
        $this->setIconClass(Icon::LOCATION, 'icon-location');
    }
}

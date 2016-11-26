<?php
/**
 * @package    DPF
 * @author     Digital Peak http://www.digital-peak.com
 * @copyright  Copyright (C) 2007 - 2016 Digital Peak. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl.html GNU/GPL
 */
namespace DPF\Content\Element;

use DPF\Content\Element;

class Paragraph extends Container
{

    public function prepare()
    {
        return parent::prepare('p');
    }
}

<?php
/**
 * @package    DPF
 * @author     Digital Peak http://www.digital-peak.com
 * @copyright  Copyright (C) 2007 - 2016 Digital Peak. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl.html GNU/GPL
 */
namespace DPF\Content\Element\Basic;

use DPF\Content\Element;

class Link extends Container
{

    public function __construct($id, $link, $target = null, array $classes = [], array $attributes = [])
    {
        $attributes['href'] = $link;

        if ($target) {
            $attributes['target'] = $target;
        }

        parent::__construct($id, $classes, $attributes);
    }

    protected function getTagName()
    {
        return 'a';
    }
}

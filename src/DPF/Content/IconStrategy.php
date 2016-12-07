<?php
/**
 * @package    DPF
 * @author     Digital Peak http://www.digital-peak.com
 * @copyright  Copyright (C) 2007 - 2016 Digital Peak. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl.html GNU/GPL
 */
namespace DPF\Content;

use DPF\Content\Element\Basic\Icon;

class IconStrategy
{

    private $mappings = [
        ICON::PLUS => 'dpf-icon-plus'
    ];

    /**
     *
     * @param string $type
     * @return string
     */
    public function getIconClass($type)
    {
        if (key_exists($type, $this->mappings)) {
            return $this->mappings[$type];
        }

        return 'dpf-icon-notfound';
    }

    protected function setIconClass($type, $class)
    {
        $this->mappings[$type] = $class;
    }
}

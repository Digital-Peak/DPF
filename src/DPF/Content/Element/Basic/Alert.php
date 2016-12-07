<?php
/**
 * @package    DPF
 * @author     Digital Peak http://www.digital-peak.com
 * @copyright  Copyright (C) 2007 - 2016 Digital Peak. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl.html GNU/GPL
 */
namespace DPF\Content\Element\Basic;

use DPF\Content\Element\Basic\Container;
use DPF\Content\Element;

class Alert extends Container
{

    const WARNING = 'warning';

    public function __construct($id, $type, array $classes = [], array $attributes = [])
    {
        if (! in_array($type, [
            self::WARNING
        ])) {
            $type = self::WARNING;
        }

        $classes[] = $this->getAlertClass($type);
        $this->setProtectClass($this->getAlertClass($type));

        parent::__construct($id, $classes, $attributes);
    }

    protected function getAlertClass($type)
    {
        return 'dpf-alert-' . $type;
    }
}

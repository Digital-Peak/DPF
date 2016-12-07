<?php
/**
 * @package    DPF
 * @author     Digital Peak http://www.digital-peak.com
 * @copyright  Copyright (C) 2007 - 2016 Digital Peak. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl.html GNU/GPL
 */
namespace DPF\Content\Element\Basic;

use DPF\Content\Element;
use DPF\Content\IconStrategy;

class Icon extends Element
{

    const PLUS = 'plus';

    private $iconStrategy = null;

    public function __construct($id, $type, array $classes = [], array $attributes = [])
    {
        if (! in_array($type, [
            self::PLUS
        ])) {
            $type = self::PLUS;
        }

        $classes[] = $this->getIconClass($type);
        $this->setProtectClass($this->getIconClass($type));

        parent::__construct($id, $classes, $attributes);
    }

    public function setIconStrategy(IconStrategy $iconStrategy = null)
    {
        $this->iconStrategy = $iconStrategy;
    }

    protected function getIconClass($type)
    {
        if ($this->iconStrategy) {
            return $this->iconStrategy->getIconClass($type);
        }
        return 'dpf-icon-' . $type;
    }

    protected function getTagName()
    {
        return 'i';
    }
}

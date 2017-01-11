<?php
/**
 * @package    DPF
 * @author     Digital Peak http://www.digital-peak.com
 * @copyright  Copyright (C) 2007 - 2016 Digital Peak. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl.html GNU/GPL
 */
namespace DPF\Content\Element\Basic;

use DPF\Content\Element;

class Heading extends Container
{

    /**
     * The heading size 1-6.
     *
     * @var integer
     */
    private $size = 1;

    public function __construct($id, $size, array $classes = [], array $attributes = [])
    {
        if ($size < 1) {
            $size = 1;
        }
        if ($size > 6) {
            $size = 6;
        }

        $this->size = $size;

        parent::__construct($id, $classes, $attributes);
    }

    public function getTagName()
    {
        return 'h' . $this->size;
    }
}

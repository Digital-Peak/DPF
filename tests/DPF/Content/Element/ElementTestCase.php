<?php
/**
 * @package    DPF
 * @author     Digital Peak http://www.digital-peak.com
 * @copyright  Copyright (C) 2007 - 2016 Digital Peak. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl.html GNU/GPL
 */
namespace DPF\Tests\Content\Element;

use DPF\Content\Element;
use PHPUnit\Framework\TestCase;
use DPF\Content\Framework;

class ElementTestCase extends TestCase
{

    public function getFramework(Element $element)
    {
        $framework = $this->getMockForAbstractClass(Framework::class);
        $framework->method('getElement')->willReturn($element);

        return $framework;
    }
}

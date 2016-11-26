<?php
/**
 * @package    DPF
 * @author     Digital Peak http://www.digital-peak.com
 * @copyright  Copyright (C) 2007 - 2016 Digital Peak. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl.html GNU/GPL
 */
namespace DPF\Tests\Content\Element;

use DPF\Content\Element;
use DPF\Content\Element\Container;

class ContainerTest extends ElementTestCase
{

    public function testEmptyRender()
    {
        $e = new Container('test');

        $this->assertXmlStringEqualsXmlString('<div id="test"></div>', $e->render());
    }
}

<?php
/**
 * @package    DPF
 * @author     Digital Peak http://www.digital-peak.com
 * @copyright  Copyright (C) 2007 - 2016 Digital Peak. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl.html GNU/GPL
 */
namespace DPF\Tests\Content\Element\Grid;

use DPF\Content\Element;
use DPF\Content\Element\Grid;
use DPF\Content\Element\Grid\Column;
use PHPUnit\Framework\TestCase;

class ColumnTest extends TestCase
{

    public function testRender()
    {
        $e = new Column('test', 4);

        $this->assertXmlStringEqualsXmlString('<div id="test" class="dpf-col-4"></div>', $e->render());
    }

    public function testRenderWithPrefix()
    {
        $e = new Column('test', 4, array(
            'unit'
        ), array(
            'dpf-prefix' => 'foo-'
        ));

        $this->assertXmlStringEqualsXmlString('<div id="foo-test" class="foo-unit dpf-col-4"></div>', $e->render());
    }
}

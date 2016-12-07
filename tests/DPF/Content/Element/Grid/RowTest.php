<?php
/**
 * @package    DPF
 * @author     Digital Peak http://www.digital-peak.com
 * @copyright  Copyright (C) 2007 - 2016 Digital Peak. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl.html GNU/GPL
 */
namespace DPF\Tests\Content\Element\Grid;

use DPF\Content\Element;
use DPF\Content\Element\Basic\Grid;
use DPF\Content\Element\Basic\Grid\Column;
use DPF\Content\Element\Basic\Grid\Row;
use PHPUnit\Framework\TestCase;

class RowTest extends TestCase
{

    public function testRender()
    {
        $e = new Row('test');
        $e->addColumn(new Column('col', 3));

        $this->assertXmlStringEqualsXmlString('<div id="test" class="dpf-row"><div id="col" class="dpf-col-3"></div></div>', $e->render());
    }

    public function testRenderNoColumns()
    {
        $e = new Row('test');

        $this->assertXmlStringEqualsXmlString('<div id="test" class="dpf-row"></div>', $e->render());
    }

    public function testRenderWithPrefix()
    {
        $e = new Row('test', array(
            'unit'
        ), array(
            'dpf-prefix' => 'foo-'
        ));

        $this->assertXmlStringEqualsXmlString('<div id="foo-test" class="foo-unit dpf-row"></div>', $e->render());
    }
}

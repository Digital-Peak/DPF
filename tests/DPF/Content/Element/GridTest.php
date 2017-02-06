<?php
/**
 * @package    DPF
 * @author     Digital Peak http://www.digital-peak.com
 * @copyright  Copyright (C) 2007 - 2016 Digital Peak. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl.html GNU/GPL
 */
namespace DPF\Tests\Content\Element;

use DPF\Content\Element;
use DPF\Content\Element\Basic\Container;
use DPF\Content\Element\Basic\Grid;
use PHPUnit\Framework\TestCase;
use DPF\Content\Element\Basic\Grid\Row;
use DPF\Content\Element\Basic\Grid\Column;

class GridTest extends TestCase
{

    public function testRender()
    {
        $e = new Grid('test');
        $e->addRow(new Row('row'))->addColumn(new Column('col', 3));

        $this->assertXmlStringEqualsXmlString('<div id="test"><div id="test-row" class="dpf-row"><div id="test-row-col" class="dpf-col-3"></div></div></div>', $e->render());
    }

    public function testRenderNoChildren()
    {
        $e = new Container('test');

        $this->assertXmlStringEqualsXmlString('<div id="test"></div>', $e->render());
    }
}

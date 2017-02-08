<?php
/**
 * @package    DPF
 * @author     Digital Peak http://www.digital-peak.com
 * @copyright  Copyright (C) 2007 - 2016 Digital Peak. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl.html GNU/GPL
 */
namespace DPF\Tests\Content\Element;

use DPF\Content\Element\Basic\Grid;
use DPF\Content\Element\Basic\Grid\Column;
use DPF\Content\Element\Basic\Grid\Row;
use PHPUnit\Framework\TestCase;

class GridTest extends TestCase
{

	public function testRender()
	{
		$e = new Grid('test');
		$e->addRow(new Row('row'))->addColumn(new Column('col', 3));

		$string  = '<div id="test"><div id="test-row" class="dpf-row">';
		$string .= '<div id="test-row-col" class="dpf-col-3"></div>';
		$string .= '</div></div>';

		$this->assertXmlStringEqualsXmlString($string, $e->render());
	}

	public function testRenderNoChildren()
	{
		$e = new Grid('test');

		$this->assertXmlStringEqualsXmlString('<div id="test"></div>', $e->render());
	}
}

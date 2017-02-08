<?php
/**
 * @package    DPF
 * @author     Digital Peak http://www.digital-peak.com
 * @copyright  Copyright (C) 2007 - 2016 Digital Peak. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl.html GNU/GPL
 */
namespace DPF\Tests\Content\Container;

use PHPUnit\Framework\TestCase;
use DPF\Content\Element\Basic\Container;
use DPF\Content\Element\Basic\TextBlock;
use DPF\Content\Visitor\Basic\ElementVisitor;

class ContainerTest extends TestCase
{

	public function testRender()
	{
		$e = new Container('test');
		$el = $e->addChild(new Container('unit'));
		$el->setContent('unit test');

		$this->assertXmlStringEqualsXmlString('<div id="test"><div id="test-unit">unit test</div></div>', $e->render());
	}

	public function testRenderNoChildren()
	{
		$e = new Container('test');

		$this->assertXmlStringEqualsXmlString('<div id="test"></div>', $e->render());
	}

	public function testRenderMultiple()
	{
		$e = new Container('test');
		$e->addChild(new Container('unit1'))->addChild(new Container('unit1.1'));

		$c = $e->addChild(new Container('unit2'));
		$c->addChild(new Container('unit2.1'));
		$c->addChild(new Container('unit2.2'));

		$string  = '<div id="test">';
		$string .= '<div id="test-unit1"><div id="test-unit1-unit1.1"></div></div>';
		$string .= '<div id="test-unit2"><div id="test-unit2-unit2.1"></div><div id="test-unit2-unit2.2"></div></div>';
		$string .= '</div>';

		$this->assertXmlStringEqualsXmlString($string, $e->render());
	}

	public function testRenderWithPrefix()
	{
		$e = new Container('test', array(), array('dpf-prefix' => 'foo-'));
		$e->addChild(new Container('unit'))
			->addChild(new Container('bar', array('doo')))
			->addChild(new Container('john'));


		$string  = '<div id="test">';
		$string .= '<div id="test-unit">';
		$string .= '<div id="test-unit-bar" class="foo-doo">';
		$string .= '<div id="test-unit-bar-john"></div>';
		$string .= '</div>';
		$string .= '</div>';
		$string .= '</div>';

		$this->assertXmlStringEqualsXmlString($string, $e->render());
	}

	public function testAccept()
	{
		$visitor = $this->getMockBuilder(ElementVisitor::class)->getMock();
		$visitor->expects($this->once())->method('visitContainer');
		$visitor->expects($this->once())->method('visitTextBlock');

		$e = new Container('test');
		$e->addChild(new TextBlock('unit'));
		$e->accept($visitor);
	}
}

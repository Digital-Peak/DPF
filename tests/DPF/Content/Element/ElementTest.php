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

class ElementTest extends TestCase
{

	public function testRender()
	{
		$e = new Element('test');

		$this->assertXmlStringEqualsXmlString('<div id="test"></div>', $e->render());
	}

	public function testRenderWithContent()
	{
		$e = new Element('test');
		$e->setContent('unit');

		$this->assertXmlStringEqualsXmlString('<div id="test">unit</div>', $e->render());
	}

	public function testRenderWithHTMLContent()
	{
		$e = new Element('test');
		$e->setContent('<p>unit</p>');

		$this->assertXmlStringEqualsXmlString('<div id="test"><p>unit</p></div>', $e->render());
	}

	/**
	 * @expectedException DOMException
	 */
	public function testRenderWithInvalidHTMLContent()
	{
		$e = new Element('test');
		$e->setContent('<p>unit');
		$e->render();
	}

	public function testRenderWithPrefix()
	{
		$e = new Element('test', array(
			'unit'
		), array(
			'dpf-prefix' => 'foo-'
		));

		$this->assertXmlStringEqualsXmlString('<div id="foo-test" class="foo-unit"></div>', $e->render());
	}

	public function testRenderWithPrefixProtectedClass()
	{
		$e = new Element('test', array(
			'foo',
			'bar'
		), array(
			'dpf-prefix' => 'unit-'
		));
		$e->setProtectedClass('bar');

		$this->assertXmlStringEqualsXmlString('<div id="unit-test" class="unit-foo bar"></div>', $e->render());
	}

	public function testRenderWithFramework()
	{
		$e = new Element('test', array(
			'foo',
			'bar'
		));

		$override = new Element('override', array(
			'ovbar'
		));

		$framework = $this->getMockBuilder(Framework::class)->getMock();
		$framework->method('getElement')->willReturn($override);

		$this->assertXmlStringEqualsXmlString('<div id="override" class="ovbar"></div>', $e->render($framework));
	}
}

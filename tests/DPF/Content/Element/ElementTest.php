<?php
/**
 * @package    DPF
 * @author     Digital Peak http://www.digital-peak.com
 * @copyright  Copyright (C) 2007 - 2016 Digital Peak. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl.html GNU/GPL
 */
namespace DPF\Tests\Content\Element;

use PHPUnit\Framework\TestCase;
use DPF\Content\Element\Basic\AbstractElement;
use DPF\Content\Visitor\Basic\ElementVisitor;
use DPF\Content\Element\Basic\Grid\Row;

class ElementTest extends TestCase
{

	public function testRender()
	{
		$e = $this->getElement('test');

		$this->assertXmlStringEqualsXmlString('<div id="test"></div>', $e->render());
	}

	public function testRenderWithContent()
	{
		$e = $this->getElement('test');
		$e->setContent('unit');

		$this->assertXmlStringEqualsXmlString('<div id="test">unit</div>', $e->render());
	}

	public function testRenderWithHTMLContent()
	{
		$e = $this->getElement('test');
		$e->setContent('<p>unit</p>');

		$this->assertXmlStringEqualsXmlString('<div id="test"><p>unit</p></div>', $e->render());
	}

	public function testRenderWithInvalidHTMLContent()
	{
		$e = $this->getElement('test');
		$e->setContent('<p>unit');

		$this->assertEquals('<div id="test"><p>unit</div>', $e->render());
	}

	public function testRenderWithPrefix()
	{
		$e = $this->getElement('test', array(
			'unit'
		), array(
			'dpf-prefix' => 'foo-'
		));

		$this->assertXmlStringEqualsXmlString('<div id="test" class="foo-unit"></div>', $e->render());
	}

	public function testRenderWithPrefixProtectedClass()
	{
		$e = $this->getElement('test', array(
			'foo',
			'bar'
		), array(
			'dpf-prefix' => 'unit-'
		));
		$e->setProtectedClass('bar');

		$this->assertXmlStringEqualsXmlString('<div id="test" class="unit-foo bar"></div>', $e->render());
	}

	public function testAccept()
	{
		$visitor = $this->getMockBuilder(ElementVisitor::class)->getMock();
		$visitor->expects($this->once())
			->method('visitGridRow');
		$e = new Row('test');
		$e->accept($visitor);
	}

	/**
	 *
	 * @param unknown $id
	 * @param array $classes
	 * @param array $attributes
	 *
	 * @return AbstractElement
	 */
	private function getElement($id, $classes = [], $attributes = [])
	{
		return $this->getMockForAbstractClass(AbstractElement::class, [
			$id,
			$classes,
			$attributes
		]);
	}
}

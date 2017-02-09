<?php
/**
 * @package    DPF
 * @author     Digital Peak http://www.digital-peak.com
 * @copyright  Copyright (C) 2007 - 2016 Digital Peak. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl.html GNU/GPL
 */
namespace DPF\Tests\Content\Element;

use PHPUnit\Framework\TestCase;
use DPF\Content\Element\Basic\Element;
use DPF\Content\Visitor\ElementVisitorInterface;

class ElementTest extends TestCase
{

	public function testGetId()
	{
		$e = new Element('test');

		$this->assertEquals('test', $e->getId());
	}

	public function testGetContent()
	{
		$e = new Element('test');
		$e->setContent('unit');

		$this->assertEquals('unit', $e->getContent());
	}

	public function testGetContentWithHTMLContent()
	{
		$e = new Element('test');
		$e->setContent('<p>unit</p>');

		$this->assertEquals('<p>unit</p>', $e->getContent());
	}

	public function testGetContentWithInvalidHTMLContent()
	{
		$e = new Element('test');
		$e->setContent('<p>unit');

		$this->assertEquals('<p>unit', $e->getContent());
	}

	public function testGetAttributes()
	{
		$e = new Element('test');

		$this->assertEquals('test', $e->getAttributes()['id']);
	}

	public function testGetClassFromAttributes()
	{
		$e = new Element('test', array('unit'));

		$this->assertEquals('unit', $e->getAttributes()['class']);
	}

	public function testGetClassFromAttributesWithPrefix()
	{
		$e = new Element('test', array('unit'), array('dpf-prefix' => 'foo-'));

		$this->assertEquals('foo-unit', $e->getAttributes()['class']);
	}

	public function testGetClassFromAttributesWithPrefixProtectedClass()
	{
		$e = new Element('test', array('foo', 'bar'), array('dpf-prefix' => 'unit-'));
		$e->setProtectedClass('bar');

		$this->assertEquals('unit-foo bar', $e->getAttributes()['class']);
	}

	public function testAccept()
	{
		$visitor = $this->getMockBuilder(ElementVisitorInterface::class)->getMock();
		$visitor->expects($this->once())->method('visitElement');

		$e = new Element('test');
		$e->accept($visitor);
	}
}

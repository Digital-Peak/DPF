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
use DPF\Content\Visitor\ElementVisitorInterface;

class ContainerTest extends TestCase
{

	public function testAddChild()
	{
		$e = new Container('test');
		$el = $e->addChild(new Container('unit'));

		$this->assertInstanceOf(Container::class, $el);

		$this->assertEquals($el, $e->getChildren()[0]);
	}

	public function testAccept()
	{
		$visitor = $this->getMockBuilder(ElementVisitorInterface::class)->getMock();
		$visitor->expects($this->once())->method('visitContainer');
		$visitor->expects($this->once())->method('visitTextBlock');

		$e = new Container('test');
		$e->addChild(new TextBlock('unit'));
		$e->accept($visitor);
	}
}

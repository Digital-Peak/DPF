<?php
/**
 * @package    DPF
 * @author     Digital Peak http://www.digital-peak.com
 * @copyright  Copyright (C) 2007 - 2016 Digital Peak. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl.html GNU/GPL
 */
namespace DPF\Tests\Content\Element\Basic;

use PHPUnit\Framework\TestCase;
use DPF\Content\Element\Extension\FacebookComment;
use DPF\Content\Visitor\ElementVisitorInterface;

class FacebookCommentTest extends TestCase
{

	public function testAttributes()
	{
		$e = new FacebookComment('test', 'https://digital-peak.com');

		$this->assertContains('https://digital-peak.com', $e->getAttributes());
	}

	public function testAccept()
	{
		$visitor = $this->getMockBuilder(ElementVisitorInterface::class)->getMock();
		$visitor->expects($this->once())->method('visitFacebookComment');

		$e = new FacebookComment('test', 'https://digital-peak.com');
		$e->accept($visitor);
	}
}

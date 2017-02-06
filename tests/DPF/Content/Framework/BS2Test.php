<?php
/**
 * @package    DPF
 * @author     Digital Peak http://www.digital-peak.com
 * @copyright  Copyright (C) 2007 - 2016 Digital Peak. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl.html GNU/GPL
 */
namespace DPF\Tests\Content\Framework;

use DPF\Content\Framework;
use PHPUnit\Framework\TestCase;
use DPF\Content\Framework\BS2;
use DPF\Content\Element\Basic\Alert;

class BS2Test extends TestCase
{

	public function testBS2Alert()
	{
		$f = new BS2();

		$e = $f->prepareElement(new Alert('test',Alert::INFO));
		$this->assertInstanceOf(Alert::class, $e);
		$this->assertXmlStringEqualsXmlString('<div class="dpf-alert-info alert alert-info" id="test"/>', $e->render());
	}
}

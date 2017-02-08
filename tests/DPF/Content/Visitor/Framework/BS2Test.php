<?php
/**
 * @package    DPF
 * @author     Digital Peak http://www.digital-peak.com
 * @copyright  Copyright (C) 2007 - 2016 Digital Peak. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl.html GNU/GPL
 */
namespace DPF\Tests\Content\Visitor\Framework;

use DPF\Content\Framework;
use PHPUnit\Framework\TestCase;
use DPF\Content\Element\Basic\Alert;
use DPF\Content\Visitor\Framework\BS2;

class BS2Test extends TestCase
{

	public function testBS2Alert()
	{
		$a = new Alert('test', Alert::INFO);
		$f = new BS2();

		$f->visitAlert($a);
		$this->assertXmlStringEqualsXmlString('<div class="dpf-alert-info alert alert-info" id="test"/>', $a->render());
	}
}

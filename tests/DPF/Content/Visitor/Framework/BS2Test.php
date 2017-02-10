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
use DPF\Content\Element\Basic\Grid\Column;

class BS2Test extends TestCase
{

	public function testBS2Alert()
	{
		$a = new Alert('test', Alert::INFO);
		$f = new BS2();

		$f->visitAlert($a);
		$this->assertEquals('dpf-alert-info alert alert-info', $a->getAttributes()['class']);
	}

	public function testBS2GridColumnMin()
	{
		$c = new Column('test', 1);
		$f = new BS2();

		$f->visitGridColumn($c);
		$this->assertEquals('dpf-col-1 span1', $c->getAttributes()['class']);
	}

	public function testBS2GridColumnMiddle()
	{
		$c = new Column('test', 25);
		$f = new BS2();

		$f->visitGridColumn($c);
		$this->assertEquals('dpf-col-25 span3', $c->getAttributes()['class']);
	}

	public function testBS2GridColumnFull()
	{
		$c = new Column('test', 120);
		$f = new BS2();

		$f->visitGridColumn($c);
		$this->assertEquals('dpf-col-100 span12', $c->getAttributes()['class']);
	}
}

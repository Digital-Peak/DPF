<?php

namespace CCL\Tests\Content\Visitor\Html\Framework;

use CCL\Content\Element\Component\Tab;
use CCL\Content\Element\Component\TabContainer;
use CCL\Content\Framework;
use CCL\Content\Visitor\Html\Framework\BS4;
use PHPUnit\Framework\TestCase;
use CCL\Content\Element\Component\Alert;
use CCL\Content\Visitor\Html\Framework\BS2;
use CCL\Content\Element\Component\Grid\Column;

class BS4Test extends TestCase
{

	public function testBS4Tabs()
	{
		$t = new TabContainer('test');
		$t->addTab(new Tab('tab', 'test', 'Test'));

		$t->accept(new BS4());

		$this->assertContains('nav-item', $t->getTabLinks()->getChildren()[0]->getAttributes()['class']);
		$this->assertContains('nav-link', $t->getTabLinks()->getChildren()[0]->getChildren()[0]->getAttributes()['class']);
	}
}

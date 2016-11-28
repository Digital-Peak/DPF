<?php
/**
 * @package    DPF
 * @author     Digital Peak http://www.digital-peak.com
 * @copyright  Copyright (C) 2007 - 2016 Digital Peak. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl.html GNU/GPL
 */
namespace DPF\Tests\Content\Element;

use DPF\Content\Element;
use DPF\Content\Element\Container;
use DPF\Content\Element\Paragraph;
use DPF\Content\Framework;
use PHPUnit\Framework\TestCase;

class FrameworkTest extends TestCase
{

    public function testFrameworkRender()
    {
        $f = new Framework();
        $f->addOverride(Container::class, function (Element $element) {
            return new Paragraph('unit');
        });

        $e = $f->getElement(new Container('test'));
        $this->assertInstanceOf(Paragraph::class, $e);
        $this->assertXmlStringEqualsXmlString('<p id="unit"></p>', $e->render());
    }
}

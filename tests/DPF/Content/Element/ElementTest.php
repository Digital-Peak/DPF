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

    public function getFramework(Element $element)
    {
        $framework = $this->getMockForAbstractClass(Framework::class);
        $framework->method('getElement')->willReturn($element);

        return $framework;
    }
}

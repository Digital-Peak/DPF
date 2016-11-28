<?php
/**
 * @package    DPF
 * @author     Digital Peak http://www.digital-peak.com
 * @copyright  Copyright (C) 2007 - 2016 Digital Peak. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl.html GNU/GPL
 */
namespace DPF\Tests\Content\Element;

use DPF\Content\Element;
use DPF\Content\Element\Link;
use PHPUnit\Framework\TestCase;

class LinkTest extends TestCase
{

    public function testRender()
    {
        $e = new Link('test', 'https://digital-peak.com');

        $this->assertXmlStringEqualsXmlString('<a id="test" href="https://digital-peak.com"></a>', $e->render());
    }
}

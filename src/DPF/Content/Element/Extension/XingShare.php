<?php
/**
 * @package    DPF
 * @author     Digital Peak http://www.digital-peak.com
 * @copyright  Copyright (C) 2007 - 2016 Digital Peak. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl.html GNU/GPL
 */
namespace DPF\Content\Element\Extension;

use DPF\Content\Element\Basic\Element;
use DPF\Content\Visitor\ElementVisitorInterface;

class XingShare extends Element
{

	public function __construct($id, array $classes = [], array $attributes = [])
	{
		$attributes['data-type'] = 'xing/share';

		parent::__construct($id, $classes, $attributes);

		$this->setContent('<script>;(function (d, s) {
    var x = d.createElement(s),
      s = d.getElementsByTagName(s)[0];
      x.src = "https://www.xing-share.com/plugins/share.js";
      s.parentNode.insertBefore(x, s);
  })(document, "script");</script>');
	}

	/**
	 * {@inheritDoc}
	 *
	 * @see \DPF\Content\Element\ElementInterface::accept()
	 */
	public function accept(ElementVisitorInterface $visitor)
	{
		$visitor->visitXingShare($this);
	}
}

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

class FacebookLike extends Element
{

	public function __construct($id, $url, array $classes = [], array $attributes = [])
	{
		$attributes['data-href'] = $url;

		$classes[] = 'fb-like';
		$this->setProtectedClass('fb-like');

		parent::__construct($id, $classes, $attributes);
	}

	/**
	 * {@inheritDoc}
	 *
	 * @see \DPF\Content\Element\ElementInterface::accept()
	 */
	public function accept(ElementVisitorInterface $visitor)
	{
		$visitor->visitFacebookLike($this);
	}
}

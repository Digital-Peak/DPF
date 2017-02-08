<?php
/**
 * @package    DPF
 * @author     Digital Peak http://www.digital-peak.com
 * @copyright  Copyright (C) 2007 - 2016 Digital Peak. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl.html GNU/GPL
 */
namespace DPF\Content\Element\Extension;

use DPF\Content\Element\Basic\AbstractElement;

class FacebookLike extends AbstractElement
{

	public function __construct($id, $url, array $classes = [], array $attributes = [])
	{
		$attributes['data-href'] = $url;

		$classes[] = 'fb-like';
		$this->setProtectedClass('fb-like');

		parent::__construct($id, $classes, $attributes);
	}
}

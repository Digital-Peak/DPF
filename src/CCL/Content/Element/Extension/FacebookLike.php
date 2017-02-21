<?php

namespace CCL\Content\Element\Extension;

use CCL\Content\Element\Basic\Element;
use CCL\Content\Visitor\ElementVisitorInterface;

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
	 * @see \CCL\Content\Element\ElementInterface::accept()
	 */
	public function accept(ElementVisitorInterface $visitor)
	{
		$visitor->visitFacebookLike($this);
	}
}

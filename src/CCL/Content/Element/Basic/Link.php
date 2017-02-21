<?php

namespace CCL\Content\Element\Basic;

/**
 * A link representation.
 */
class Link extends Container
{

	public function __construct($id, $link, $target = null, array $classes = [], array $attributes = [])
	{
		$attributes['href'] = $link;

		if ($target) {
			$attributes['target'] = $target;
		}

		parent::__construct($id, $classes, $attributes);
	}
}

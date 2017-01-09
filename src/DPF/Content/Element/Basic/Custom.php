<?php
/**
 * @package    DPF
 * @author     Digital Peak http://www.digital-peak.com
 * @copyright  Copyright (C) 2007 - 2016 Digital Peak. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl.html GNU/GPL
 */
namespace DPF\Content\Element\Basic;

use DPF\Content\Element;

class Custom extends Container
{

	/**
	 * The custom tag name.
	 *
	 * @var string
	 */
	private $tagName = null;

	public function __construct($id, $tagName, array $classes = [], array $attributes = [])
	{
		$this->tagName = $tagName;

		parent::__construct($id, $classes, $attributes);
	}

	protected function getTagName()
	{
		return $this->tagName;
	}
}

<?php
/**
 * @package    DPF
 * @author     Digital Peak http://www.digital-peak.com
 * @copyright  Copyright (C) 2007 - 2016 Digital Peak. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl.html GNU/GPL
 */
namespace DPF\Content\Element\Basic;

use DPF\Content\Element\Basic\Container;

/**
 * A tab representation.
 */
class Tab extends Container
{

	/**
	 * The name of the tab.
	 *
	 * @var string
	 */
	private $name = '';

	public function __construct($id, $name, array $classes = [], array $attributes = [])
	{
		$classes[] = 'dpf-tab';
		$this->setProtectedClass('dpf-tab');

		parent::__construct($id, $classes, $attributes);

		$this->name = $name;
	}

	/**
	 * Returns the name of the tab.
	 *
	 * @return string
	 */
	public function getName()
	{
		return $this->name;
	}
}

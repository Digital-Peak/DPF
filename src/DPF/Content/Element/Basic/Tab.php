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

	/**
	 * The title of the tab.
	 *
	 * @var string
	 */
	private $title = '';

	public function __construct($id, $name, $title, array $classes = [], array $attributes = [])
	{
		$classes[] = 'dpf-tab';
		$this->setProtectedClass('dpf-tab');

		parent::__construct($id, $classes, $attributes);

		$this->name = $name;
		$this->title = $title;
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

	/**
	 * Returns the title of the tab.
	 *
	 * @return string
	 */
	public function getTitle()
	{
		return $this->title;
	}
}

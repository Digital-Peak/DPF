<?php
/**
 * @package    DPF
 * @author     Digital Peak http://www.digital-peak.com
 * @copyright  Copyright (C) 2007 - 2016 Digital Peak. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl.html GNU/GPL
 */
namespace DPF\Content\Element\Basic\Grid;

use DPF\Content\Element\Basic\Container;

/**
 * A column representation.
 */
class Column extends Container
{

	/**
	 * The width of the column.
	 *
	 * @var integer
	 */
	private $width = 0;

	public function __construct($id, $width, array $classes = [], array $attributes = [])
	{
		$classes[] = 'dpf-col-' . $width;
		$this->setProtectedClass('dpf-col-' . $width);

		parent::__construct($id, $classes, $attributes);

		$this->width = $width;
	}

	/**
	 * Returns the width of a column.
	 *
	 * @return number
	 */
	public function getWidth()
	{
		return $this->width;
	}
}

<?php
/**
 * @package    DPF
 * @author     Digital Peak http://www.digital-peak.com
 * @copyright  Copyright (C) 2007 - 2016 Digital Peak. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl.html GNU/GPL
 */
namespace DPF\Content\Element\Component\Grid;

use DPF\Content\Element\Basic\Container;

/**
 * A column representation.
 */
class Column extends Container
{

	/**
	 * The width of the column as percentag.
	 *
	 * @var integer
	 */
	private $width = 0;

	public function __construct($id, $width, array $classes = [], array $attributes = [])
	{
		parent::__construct($id, $classes, $attributes);

		if ($width > 100) {
			$width = 100;
		}

		$this->width = $width;

		$this->addClass('dpf-col-' . $width, true);
	}

	/**
	 * Returns the width of a column in percentage.
	 *
	 * @return number
	 */
	public function getWidth()
	{
		return $this->width;
	}
}

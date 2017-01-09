<?php
/**
 * @package    DPF
 * @author     Digital Peak http://www.digital-peak.com
 * @copyright  Copyright (C) 2007 - 2016 Digital Peak. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl.html GNU/GPL
 */
namespace DPF\Content;

use DPF\Content\Element\Basic\Icon;

/**
 * The icon strategy class.
 */
class IconStrategy
{

	/**
	 * Internal mappsing of icons.
	 *
	 * @var array
	 */
	private $mappings = [
		ICON::PLUS => 'dpf-icon-plus',
		ICON::LOCATION => 'dpf-icon-location',
		ICON::EDIT => 'dpf-icon-edit'
	];

	/**
	 * Returns the icon class for the given type.
	 *
	 * @param string $type
	 *
	 * @return string
	 *
	 * @see Icon::getType
	 */
	public function getIconClass($type)
	{
		if (key_exists($type, $this->mappings)) {
			return $this->mappings[$type];
		}

		return 'dpf-icon-notfound';
	}

	/**
	 * Subclasses can override icon mappings.
	 *
	 * @param string $type
	 * @param string $class
	 */
	protected function setIconClass($type, $class)
	{
		$this->mappings[$type] = $class;
	}
}

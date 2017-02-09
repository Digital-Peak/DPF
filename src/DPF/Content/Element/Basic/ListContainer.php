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
 * An alert representation.
 */
class ListContainer extends Container
{

	/**
	 * The ordered type.
	 *
	 * @var string
	 */
	const ORDERED = 'ordered';

	/**
	 * The unordered type.
	 *
	 * @var string
	 */
	const UNORDERED = 'unordered';

	/**
	 * The type.
	 *
	 * @var unknown
	 */
	private $type = self::UNORDERED;

	/**
	 * Initiates the alert of the given type.
	 *
	 * @param string $type
	 * @param array $classes
	 * @param array $attributes
	 */
	public function __construct($id, $type, array $classes = [], array $attributes = [])
	{
		if (! in_array($type, [
			self::UNORDERED,
			self::ORDERED
		])) {
			$type = self::UNORDERED;
		}

		$classes[] = 'dpf-list-' . $type;
		$this->setProtectedClass('dpf-list-' . $type);

		parent::__construct($id, $classes, $attributes);

		$this->type = $type;
	}

	/**
	 * Returns the type of the list.
	 *
	 * @return string
	 */
	public function getType()
	{
		return $this->type;
	}

	/**
	 * Adds the given list item to the children and returns it for chaining.
	 *
	 * @param ListItem $listItem
	 * @return ListItem
	 */
	public function addListItem(ListItem $listItem)
	{
		return $this->addChild($listItem);
	}
}

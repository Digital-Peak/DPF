<?php
/**
 * @package    DPF
 * @author     Digital Peak http://www.digital-peak.com
 * @copyright  Copyright (C) 2007 - 2016 Digital Peak. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl.html GNU/GPL
 */
namespace DPF\Content\Element\Basic;

use DPF\Content\Element\Basic\Container;
use DPF\Content\Element;

/**
 * An alert representation.
 */
class Alert extends Container
{

	/**
	 * The info alert.
	 *
	 * @var string
	 */
	const INFO = 'info';

	/**
	 * The warning alert.
	 *
	 * @var string
	 */
	const WARNING = 'warning';

	/**
	 * The type.
	 *
	 * @var unknown
	 */
	private $type = self::INFO;

	/**
	 * Initiates the alert of the given type.
	 *
	 * @param string $type
	 * @param Icon $icon
	 * @param array $classes
	 * @param array $attributes
	 */
	public function __construct($id, $type, array $classes = [], array $attributes = [])
	{
		if (! in_array($type, [
			self::INFO,
			self::WARNING
		])) {
			$type = self::WARNING;
		}

		$classes[] = 'dpf-alert-' . $type;
		$this->setProtectedClass('dpf-alert-' . $type);

		parent::__construct($id, $classes, $attributes);

		$this->type = $type;
	}

	/**
	 * Returns the type of alert.
	 *
	 * @return string
	 */
	public function getType()
	{
		return $this->type;
	}
}

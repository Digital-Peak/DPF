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
 * A badge representation.
 */
class Badge extends Container
{

	/**
	 * The info alert.
	 *
	 * @var string
	 */
	const INFO = 'info';

	/**
	 * The success alert.
	 *
	 * @var string
	 */
	const SUCCESS = 'success';

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
	 * @param array $classes
	 * @param array $attributes
	 */
	public function __construct($id, $type, array $classes = [], array $attributes = [])
	{
		if (! in_array($type, [
			self::INFO,
			self::SUCCESS,
			self::WARNING
		])) {
			$type = self::INFO;
		}

		$classes[] = 'dpf-badge-' . $type;
		$this->setProtectedClass('dpf-badge-' . $type);

		parent::__construct($id, $classes, $attributes);

		$this->type = $type;
	}

	/**
	 * Returns the type of the badge.
	 *
	 * @return string
	 */
	public function getType()
	{
		return $this->type;
	}
}

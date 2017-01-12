<?php
/**
 * @package    DPF
 * @author     Digital Peak http://www.digital-peak.com
 * @copyright  Copyright (C) 2007 - 2016 Digital Peak. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl.html GNU/GPL
 */
namespace DPF\Content\Element\Basic;

use DPF\Content\Element;
use DPF\Content\IconStrategy;

/**
 * An icon representation.
 */
class Icon extends Element
{

	/**
	 * The plus icon.
	 *
	 * @var string
	 */
	const PLUS = 'plus';

	/**
	 * The location icon.
	 *
	 * @var string
	 */
	const LOCATION = 'location';

	/**
	 * The edit icon.
	 *
	 * @var string
	 */
	const EDIT = 'edit';

	/**
	 * The delete icon.
	 *
	 * @var string
	 */
	const DELETE = 'delete';

	/**
	 * The edit icon.
	 *
	 * @var string
	 */
	const PRINTING = 'print';

	/**
	 * The mail icon.
	 *
	 * @var string
	 */
	const MAIL = 'mail';

	/**
	 * The download icon.
	 *
	 * @var string
	 */
	const DOWNLOAD = 'download';

	/**
	 * The signup icon.
	 *
	 * @var string
	 */
	const SIGNUP = 'signup';

	/**
	 * Array which holds all available icons.
	 *
	 * @var array
	 */
	private static $ALL_ICONS = [
		self::PLUS,
		self::LOCATION,
		self::EDIT,
		self::DELETE,
		self::PRINTING,
		self::MAIL,
		self::DOWNLOAD,
		self::SIGNUP
	];

	/**
	 * Prepares the icon with the given strategy if available.
	 *
	 * @param string $id
	 * @param string $type
	 * @param IconStrategy $iconStrategy
	 * @param array $classes
	 * @param array $attributes
	 */
	public function __construct($id, $type, IconStrategy $iconStrategy = null, array $classes = [], array $attributes = [])
	{
		if (! in_array($type, self::$ALL_ICONS)) {
			$type = self::PLUS;
		}

		$class = 'dpf-icon-' . $type;

		if ($iconStrategy) {
			$class = $iconStrategy->getIconClass($type);
		}

		$classes[] = $class;
		$this->setProtectedClass($class);

		parent::__construct($id, $classes, $attributes);
	}

	/**
	 *
	 * {@inheritdoc}
	 *
	 * @see Element::getTagName()
	 */
	public function getTagName()
	{
		return 'i';
	}
}

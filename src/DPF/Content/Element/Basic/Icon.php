<?php
/**
 * @package    DPF
 * @author     Digital Peak http://www.digital-peak.com
 * @copyright  Copyright (C) 2007 - 2016 Digital Peak. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl.html GNU/GPL
 */
namespace DPF\Content\Element\Basic;

/**
 * An icon representation.
 */
class Icon extends AbstractElement
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
	 * The up icon.
	 *
	 * @var string
	 */
	const UP = 'up';

	/**
	 * The down icon.
	 *
	 * @var string
	 */
	const DOWN = 'down';

	/**
	 * The ok icon.
	 *
	 * @var string
	 */
	const OK = 'ok';

	/**
	 * The cancel icon.
	 *
	 * @var string
	 */
	const CANCEL = 'cancel';

	/**
	 * The info icon.
	 *
	 * @var string
	 */
	const INFO = 'info';

	/**
	 * The users icon.
	 *
	 * @var string
	 */
	const USERS = 'users';

	/**
	 * The search icon.
	 *
	 * @var string
	 */
	const SEARCH = 'search';

	/**
	 * The file icon.
	 *
	 * @var string
	 */
	const FILE = 'file';

	/**
	 * The calendar icon.
	 *
	 * @var string
	 */
	const CALENDAR = 'calendar';

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
		self::SIGNUP,
		self::UP,
		self::DOWN,
		self::OK,
		self::CANCEL,
		self::INFO,
		self::USERS,
		self::SEARCH,
		self::FILE,
		self::CALENDAR
	];

	/**
	 * The type of the icon.
	 *
	 * @var string
	 */
	private $type = self::PLUS;

	/**
	 * Prepares the icon with the given strategy if available.
	 *
	 * @param string $id
	 * @param string $type
	 * @param array $classes
	 * @param array $attributes
	 */
	public function __construct($id, $type, array $classes = [], array $attributes = [])
	{
		parent::__construct($id, $classes, $attributes);

		if (! in_array($type, self::$ALL_ICONS)) {
			$type = self::PLUS;
		}

		$this->type = $type;

		$this->addClass('dpf-icon-' . $type, true);
	}

	/**
	 * Returns the type of the icon.
	 *
	 * @return string
	 */
	public function getType()
	{
		return $this->type;
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

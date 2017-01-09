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

class Icon extends Element
{

	const PLUS = 'plus';

	const LOCATION = 'location';

	const EDIT = 'edit';

	private static $ALL_ICONS = [
		self::PLUS,
		self::LOCATION,
		self::EDIT
	];

	private $iconStrategy = null;

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
		$this->setProtectClass($class);

		parent::__construct($id, $classes, $attributes);
	}

	protected function getTagName()
	{
		return 'i';
	}
}

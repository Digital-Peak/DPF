<?php
/**
 * @package    DPF
 * @author     Digital Peak http://www.digital-peak.com
 * @copyright  Copyright (C) 2007 - 2016 Digital Peak. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl.html GNU/GPL
 */
namespace DPF\Content\IconStrategy;

use DPF\Content\Element\Basic\Icon;
use DPF\Content\IconStrategy;

/**
 * The Joomla icon strategy.
 */
class Joomla extends IconStrategy
{

	/**
	 * Defines some Joomla icon mappings.
	 */
	public function __construct()
	{
		$this->setIconClass(Icon::PLUS, 'icon-plus');
		$this->setIconClass(Icon::LOCATION, 'icon-location');
		$this->setIconClass(Icon::EDIT, 'icon-edit');
		$this->setIconClass(Icon::DELETE, 'icon-remove');
		$this->setIconClass(Icon::PRINTING, 'icon-print');
		$this->setIconClass(Icon::MAIL, 'icon-envelope');
		$this->setIconClass(Icon::DOWNLOAD, 'icon-download');
		$this->setIconClass(Icon::SIGNUP, 'icon-signup');
		$this->setIconClass(Icon::UP, 'icon-arrow-up');
		$this->setIconClass(Icon::DOWN, 'icon-arrow-down');
	}
}

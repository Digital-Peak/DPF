<?php
/**
 * @package    DPF
 * @author     Digital Peak http://www.digital-peak.com
 * @copyright  Copyright (C) 2007 - 2016 Digital Peak. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl.html GNU/GPL
 */
namespace DPF\Content\Framework\BS2\Element\Basic;

use DPF\Content\Element;
use DPF\Content\Element\Basic\DescriptionListHorizontal as OriginalDescriptionListHorizontal;

class DescriptionListHorizontal extends OriginalDescriptionListHorizontal
{

	public function __construct($id, array $classes = [], array $attributes = [])
	{
		$classes[] = 'dl-horizontal';
		$this->setProtectClass('dl-horizontal');

		parent::__construct($id, $classes, $attributes);
	}
}

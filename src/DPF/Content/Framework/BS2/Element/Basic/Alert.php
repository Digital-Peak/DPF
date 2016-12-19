<?php
/**
 * @package    DPF
 * @author     Digital Peak http://www.digital-peak.com
 * @copyright  Copyright (C) 2007 - 2016 Digital Peak. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl.html GNU/GPL
 */
namespace DPF\Content\Framework\BS2\Element\Basic;

use DPF\Content\Element\Basic\Alert as OriginalAlert;

class Alert extends OriginalAlert
{

	protected function getAlertClass($type)
	{
		$mappings = [
			OriginalAlert::WARNING => 'warning'
		];
		return ' alert alert-' . $mappings[$type];
	}
}

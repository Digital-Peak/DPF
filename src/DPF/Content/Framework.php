<?php
/**
 * @package    DPF
 * @author     Digital Peak http://www.digital-peak.com
 * @copyright  Copyright (C) 2007 - 2016 Digital Peak. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl.html GNU/GPL
 */
namespace DPF\Content;

/**
 * Interface any frontend framework needs to implement.
 */
interface Framework
{

	/**
	 * Prepares the given element for rendering.
	 * The framework can anhance the given element, or return a completely new one.
	 *
	 * @return Element
	 */
	public function prepareElement(Element $element);
}

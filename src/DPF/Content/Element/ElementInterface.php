<?php
/**
 * @package    DPF
 * @author     Digital Peak http://www.digital-peak.com
 * @copyright  Copyright (C) 2007 - 2016 Digital Peak. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl.html GNU/GPL
 */
namespace DPF\Content\Element;

use DPF\Content\Visitor\ElementVisitorInterface;

/**
 * Interface which defines an element.
 */
interface ElementInterface
{
	/**
	 * Returns the id of the element.
	 *
	 * @return string
	 */
	public function getId();

	/**
	 * Returns the content of the element.
	 *
	 * @return string
	 */
	public function getContent();

	/**
	 * Returns the attributes of the element.
	 *
	 * @return string
	 */
	public function getAttributes();

	/**
	 * Returns the parent of the element.
	 *
	 * @return \DPF\Content\Element\ElementInterface
	 */
	public function getParent();

	/**
	 * Accepts the visitor and is calling the aproperiate visit method.
	 *
	 * @param ElementVisitorInterface $visitor
	 */
	public function accept(ElementVisitorInterface $visitor);
}

<?php
/**
 * @package    DPF
 * @author     Digital Peak http://www.digital-peak.com
 * @copyright  Copyright (C) 2007 - 2016 Digital Peak. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl.html GNU/GPL
 */
namespace DPF\Content\Element\Basic;

use DPF\Content\Element\Basic\Table\Row;
use DPF\Content\Element\Basic\Table\Cell;
use DPF\Content\Element\Basic\Table\Head;
use DPF\Content\Element\Basic\Table\Body;
use DPF\Content\Element\Basic\Table\Footer;
use DPF\Content\Element\Basic\Table\HeadCell;

/**
 * A Table representation.
 */
class Table extends Container
{

	private $head = null;

	private $body = null;

	private $footer = null;

	public function __construct($id, array $columns, array $classes = [], array $attributes = [])
	{
		parent::__construct($id, $classes, $attributes);

		$this->head = $this->addChild(new Head('head'));
		$this->body = $this->addChild(new Body('body'));
		$this->footer = $this->addChild(new Footer('footer'));

		$row = $this->head->addChild(new Row('row'));

		foreach ($columns as $index => $column) {
			$row->addChild(new HeadCell('cell-' . $index))->setContent($column);
		}
	}

	public function addRow(Row $row)
	{
		return $this->body->addChild($row);
	}

	public function addFooterRow(Row $row)
	{
		return $this->footer->addChild($row);
	}
}

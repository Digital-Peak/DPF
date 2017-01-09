<?php
/**
 * @package    DPF
 * @author     Digital Peak http://www.digital-peak.com
 * @copyright  Copyright (C) 2007 - 2016 Digital Peak. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl.html GNU/GPL
 */
namespace DPF\Content\Element\Basic;

use DPF\Content\Element;
use DPF\Content\Element\Basic\Table\Row;

class Table extends Container
{

	private $head = null;

	private $body = null;

	private $footer = null;

	public function __construct($id, array $columns, array $classes = [], array $attributes = [])
	{
		parent::__construct($id, $classes, $attributes);

		$this->head = $this->addChild(new Custom($id . '-head', 'thead'));
		$this->body = $this->addChild(new Custom($id . '-body', 'tbody'));
		$this->footer = $this->addChild(new Custom($id . '-footer', 'tfoot'));

		$row = $this->head->addChild(new Row($id . '-head-row'));

		$counter = 1;
		foreach ($columns as $column) {
			$row->addChild(new Custom($id . '-head-row-cell-' . $counter, 'th'));
			$counter ++;
		}
	}

	public function addRow(Row $row)
	{
		return $this->body->addChild($row);
	}
}

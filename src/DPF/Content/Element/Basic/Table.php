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
use DPF\Content\Element\Basic\Table\Cell;
use DPF\Content\Framework;

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

		foreach ($columns as $index => $column) {
			$row->addChild(new Custom($id . '-head-row-cell-' . $index, 'th'))->setContent($column);
		}
	}

	public function addRow(Row $row)
	{
		return $this->body->addChild($row);
	}

	public function build(\DOMElement $parent = null, Framework $framework = null)
	{
		// Fill the rows with empty cells
		$count = count($this->head->getChildren()[0]->getChildren());
		foreach ($this->body->getChildren() as $row) {
			while (count($row->getChildren()) < $count) {
				$row->addChild(new Cell($this->getId() . '-body-row-cell-' . count($row->getChildren())));
			}
		}
		return parent::build($parent, $framework);
	}

	public function getTagName()
	{
		return 'table';
	}
}

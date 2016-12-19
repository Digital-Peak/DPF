<?php
/**
 * @package    DPF
 * @author     Digital Peak http://www.digital-peak.com
 * @copyright  Copyright (C) 2007 - 2016 Digital Peak. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl.html GNU/GPL
 */
namespace DPF\Content\Framework;

use DPF\Content\Element\Basic\Alert;
use DPF\Content\Element\Basic\DescriptionListHorizontal;
use DPF\Content\Element\Basic\Grid\Column;
use DPF\Content\Element\Basic\Grid\Row;
use DPF\Content\Framework;

class BS2 extends Framework
{

	public function __construct()
	{
		parent::__construct();

		$instance = $this;

		// Descrition List
		$this->addOverride(DescriptionListHorizontal::class, function (DescriptionListHorizontal $list) use ($instance) {
			return $instance->createOverride(\DPF\Content\Framework\BS2\Element\Basic\DescriptionListHorizontal::class, $list);
		});

		// Grid
		$this->addOverride(Row::class, function (Row $row) use ($instance) {
			return $instance->createOverride(\DPF\Content\Framework\BS2\Element\Basic\Grid\Row::class, $row);
		});
		$this->addOverride(Column::class, function (Column $column) use ($instance) {
			$instance = new \DPF\Content\Framework\BS2\Element\Basic\Grid\Column($column->getId(), $column->getWidth(), $column->getClasses(), $column->getAttributes());
			$instance->setContent($column->getContent());
			return $instance;
		});

		// Alert
		$this->addOverride(Alert::class, function (Alert $alert) use ($instance) {
			return $instance->createOverride(\DPF\Content\Framework\BS2\Element\Basic\Alert::class, $alert);
		});
	}
}

<?php
/**
 * @package    DPF
 * @author     Digital Peak http://www.digital-peak.com
 * @copyright  Copyright (C) 2007 - 2016 Digital Peak. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl.html GNU/GPL
 */
namespace DPF\Content\Framework;

use DPF\Content\Element\DescriptionList;
use DPF\Content\Element\Grid\Column;
use DPF\Content\Element\Grid\Row;
use DPF\Content\Framework;

class BS2 extends Framework
{

    public function __construct()
    {
        parent::__construct();

        $instance = $this;
        $this->addOverride(DescriptionList::class, function (DescriptionList $list) use ($instance) {
            return $instance->createOverride(\DPF\Content\Framework\BS2\Element\DescriptionList::class, $list);
        });
        $this->addOverride(Row::class, function (Row $row) use ($instance) {
            return $instance->createOverride(\DPF\Content\Framework\BS2\Element\Grid\Row::class, $row);
        });
        $this->addOverride(Column::class, function (Column $column) use ($instance) {
            $instance = new \DPF\Content\Framework\BS2\Element\Grid\Column($column->getId(), $column->getWidth(), $column->getClasses(), $column->getAttributes());
            $instance->setContent($column->getContent());
            return $instance;
        });
    }
}

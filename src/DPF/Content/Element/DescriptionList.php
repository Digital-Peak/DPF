<?php
/**
 * @package    DPF
 * @author     Digital Peak http://www.digital-peak.com
 * @copyright  Copyright (C) 2007 - 2016 Digital Peak. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl.html GNU/GPL
 */
namespace DPF\Content\Element;

use DPF\Content\Element;
use DPF\Content\Element\Description\Description;
use DPF\Content\Element\Description\Term;

class DescriptionList extends Container
{

    /**
     *
     * @param Term $term
     * @return Term
     */
    public function setTerm(Term $term)
    {
        return $this->addChild($term);
    }

    /**
     *
     * @param Description $description
     * @return Description
     */
    public function setDescription(Description $description)
    {
        return $this->addChild($description);
    }

    protected function getTagName()
    {
        return 'dl';
    }
}

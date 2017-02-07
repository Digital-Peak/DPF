<?php
/**
 * @package    DPF
 * @author     Digital Peak http://www.digital-peak.com
 * @copyright  Copyright (C) 2007 - 2016 Digital Peak. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl.html GNU/GPL
 */
namespace DPF\Content\Element\Basic;

use DPF\Content\Element;

/**
 * A TabContainer representation.
 */
class TabContainer extends Container
{

	private $tabLinks = null;

	private $tabs = null;

	/**
	 * Adds the given tabs to the internal tabs container and returns it for chaining.
	 *
	 * @param Tab $tab
	 * @return Tab
	 */
	public function addTab(Tab $tab)
	{
		$this->getTabs()->addChild($tab);

		$li = $this->getTabLinks()->addChild(new Custom('tab-' . (count($this->getTabLinks()
			->getChildren()) + 1), 'li'));
		$li->addChild(new Link('link', '#' . $tab->getId()))
			->setContent($tab->getTitle());
		return $tab;
	}

	public function getTabLinks()
	{
		if ($this->tabLinks === null) {
			$this->tabLinks = new Custom('links', 'ul');
			$this->addChild($this->tabLinks);
		}

		return $this->tabLinks;
	}

	public function getTabs()
	{
		if ($this->tabs === null) {
			$this->getTabLinks();

			$this->tabs = new Container('tabs');
			$this->addChild($this->tabs);
		}

		return $this->tabs;
	}
}

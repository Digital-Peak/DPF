<?php
/**
 * @package    DPF
 * @author     Digital Peak http://www.digital-peak.com
 * @copyright  Copyright (C) 2007 - 2016 Digital Peak. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl.html GNU/GPL
 */
namespace DPF\Content\Element\Component;

use DPF\Content\Element\Basic\Container;

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
	 *
	 * @return Tab
	 */
	public function addTab(Tab $tab)
	{
		$this->getTabs()->addChild($tab);

		$li = $this->getTabLinks()->addChild(new ListItem('tab-' . (count($this->getTabLinks()->getChildren()) + 1)));
		$li->addChild(new Link('link', '#' . $tab->getId()))->setContent($tab->getTitle());

		return $tab;
	}

	/**
	 * Returns the container for the tab links.
	 *
	 * @return \DPF\Content\Element\Basic\ListContainer
	 */
	public function getTabLinks()
	{
		if ($this->tabLinks === null) {
			$this->tabLinks = new ListContainer('links', ListContainer::UNORDERED);
			$this->addChild($this->tabLinks);
		}

		return $this->tabLinks;
	}

	/**
	 * Returns the container for the tabs.
	 *
	 * @return \DPF\Content\Element\Basic\Container
	 */
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

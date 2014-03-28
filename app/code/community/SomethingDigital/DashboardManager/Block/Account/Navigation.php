<?php

/**
 * Manage Customer Account Dashboard via Layout
 */
class SomethingDigital_DashboardManager_Block_Account_Navigation extends Mage_Customer_Block_Account_Navigation
{

    /**
     * Remove a link based on the shortname
     * @param  string $name 
     * @return void       
     */
    public function removeLinkByName($name)
    {
        unset($this->_links[$name]);
    }

    /**
     * Change a link's label to a new label
     * @param  string $name  link shortname
     * @param  string $label 
     * @return void        
     */
    public function changeLabel($name, $label)
    {
    	if (!isset($this->_links[$name])) {
    		return;
    	}

    	$link = $this->_links[$name];
    	$link->setLabel($label);
    }

    /**
     * Resort links in navigation
     * @param  string $name     link shortname
     * @param  int $position 
     * @return void           
     */
    public function changePosition($name, $position)
    {
    	if (!isset($this->_links[$name])) {
    		return;
    	}

    	$link = $this->_links[$name];
    	$link->setPosition($position);
    }

    /**
     * Get an array of links
     * @return array 
     */
    public function getLinks()
    {
    	usort($this->_links, array($this, "_sortLinks"));
    	return $this->_links;
    }

    /**
     * Protected callback usort for iterating the _links property
     * @param  string $a
     * @param  string $b 
     * @return int    sorts up or down based on position comparator
     */
    public function _sortLinks($a, $b)
    {
    	if ($a->getPosition() == $b->getPosition()) {
	        return 0;
	    }
	    return ($a->getPosition() < $b->getPosition()) ? -1 : 1;
    }

}
<?php
class Gebex_Mktgmodule_Model_Mktgmodule extends Mage_Core_Model_Abstract
{
 
    protected function _construct()
    {
		parent::_construct();
        $this->_init('mktgmodule/mktgmodule');
    }
}
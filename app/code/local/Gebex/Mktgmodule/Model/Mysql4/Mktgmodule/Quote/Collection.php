<?php

class Gebex_Mktgmodule_Model_Mysql4_Mktgmodule_Quote_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('mktgmodule/mktgmodule_quote');
    }
}
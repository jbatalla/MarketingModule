<?php
class Gebex_Mktgmodule_Model_Mysql4_Mktgmodule extends Mage_Core_Model_Mysql4_Abstract
{
    protected function _construct()
    {
        $this->_init('mktgmodule/mktgmodule', 'mktg_id' );
    }
}
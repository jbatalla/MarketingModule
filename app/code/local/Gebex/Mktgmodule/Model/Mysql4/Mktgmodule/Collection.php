<?php
//extends Varien_Data_Collection_Db
    /*protected $_gebMarketingTable;
    public function __construct()
    {
        $resources = Mage::getSingleton('core / resource');
        parent::__construct($resources->getConnection('mktgmodule_read'));
        $this->_gebMarketingTable = $resources->getTableName('mktgmodule / mktgmodule');
 
        $this->_select->from(
        		array('mktgmodule'=>$this->_gebMarketingTable),
 		       	array(' * '))
				;
        $this->setItemObjectClass(Mage::getConfig()->getModelClassName('mktgmodule/mktgmodule'));
    }*/
class Gebex_Mktgmodule_Model_Mysql4_Mktgmodule_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
	public function _construct()
	{

		//parent::_construct();
		$this->_init('mktgmodule/mktgmodule');
	}	
	
	/*public function addFilterByIsActive($id) {
        	$this->addFieldToFilter('is_active', $id);
        	return $this;
    }*/	


}
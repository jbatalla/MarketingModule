<?php
class Gebex_Mktgmodule_Block_View extends Mage_Core_Block_Template
{
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('mktgmodule/view.phtml');
		//$this->setTemplate('custom/checkout/excellence.phtml');
    }
  
    public function getPartnermodul($myvar)
    {
    	$model = Mage::getModel('mktgmodule/mktgmodule');
    	$collection = $model
    	    	->getCollection($myvar)
    	    	->load();
		$collection->getSelect()->order('name desc');				
 
        return $collection->getItems();
    }
	
	

	
}
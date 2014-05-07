<?php
class Gebex_Mktgmodule_Block_Checkout_Onepage_Excellence extends Mage_Checkout_Block_Onepage_Abstract{
	protected function _construct()
	{
		$this->getCheckout()->setStepData('excellence', array(
            'label'     => Mage::helper('checkout')->__('Marketing Campaign'),
            'is_show'   => $this->isShow()
		));
		if ($this->isCustomerLoggedIn()) {
			$this->getCheckout()->setStepData('excellence', 'allow', true);
			$this->getCheckout()->setStepData('billing', 'allow', false);
		}

		parent::_construct();
	}
	
	public function getMarketingOptions()
	{		
		$mktg_collection = Mage::getModel('mktgmodule/mktgmodule')->getCollection();
		
		
		//return $mktg_collection;
		
		/*if (count($mktg_collection) > 0){
          foreach($mktg_collection as $campaign){
            $campaign_values[] = array('value' => $campaign['mktg_id'], 'label' => $campaign['display_text']);    
          }
      	}
	
		return $campaign_values[];*/
		/*$fieldset->addField('categories', 'multiselect', array(
          'label'     => 'Categories',
          'name'      => 'categories[]',
          'values'    => $cat_values,
      	));*/
	  	
	}
}
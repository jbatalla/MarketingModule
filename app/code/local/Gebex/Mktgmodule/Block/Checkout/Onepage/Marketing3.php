<?php
class Gebex_Mktgmodule_Block_Checkout_Onepage_Marketing3 extends Mage_Checkout_Block_Onepage_Abstract{
	protected function _construct()
	{
		$this->getCheckout()->setStepData('marketing3', array(
            'label'     => Mage::helper('checkout')->__('Marketing  Review'),
            'is_show'   => $this->isShow()
		));
		parent::_construct();
	}
}
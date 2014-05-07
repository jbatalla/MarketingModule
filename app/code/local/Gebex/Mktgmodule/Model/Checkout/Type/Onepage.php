<?php
class Gebex_Mktgmodule_Model_Checkout_Type_Onepage extends Mage_Checkout_Model_Type_Onepage{
	public function saveMarketing($data){
		if (empty($data)) {
			return array('error' => -1, 'message' => $this->_helper->__('Invalid data.'));
		}
		$this->getQuote()->setMarketingLike($data['like']);
		$this->getQuote()->collectTotals();
		$this->getQuote()->save();

		$this->getCheckout()
		->setStepData('marketing', 'allow', true)
		->setStepData('marketing', 'complete', true)
		->setStepData('billing', 'allow', true);

		return array();
	}
	public function saveMarketing2($data){
		if (empty($data)) {
			return array('error' => -1, 'message' => $this->_helper->__('Invalid data.'));
		}
		$this->getQuote()->setMarketingLike2($data['like']);
		$this->getQuote()->collectTotals();
		$this->getQuote()->save();

		$this->getCheckout()
		->setStepData('marketing2', 'allow', true)
		->setStepData('marketing2', 'complete', true)
		->setStepData('shipping_method', 'allow', true);

		return array();
	}
	public function saveMarketing3($data){
		if (empty($data)) {
			return array('error' => -1, 'message' => $this->_helper->__('Invalid data.'));
		}
		$this->getQuote()->setMarketingLike3($data['like']);
		$this->getQuote()->collectTotals();
		$this->getQuote()->save();

		$this->getCheckout()
		->setStepData('marketing3', 'allow', true)
		->setStepData('marketing3', 'complete', true);

		return array();
	}
}
<?php
class Gebex_Mktgmodule_Block_Mktgmodule_Order extends Mage_Core_Block_Template{
	public function getCustomVars(){
		$model = Mage::getModel('mktgmodule/mktgmodule_order');
		return $model->getByOrder($this->getOrder()->getId());
	}
	public function getOrder()
	{
		return Mage::registry('current_order');
	}
}
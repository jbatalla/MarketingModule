<?php
class Gebex_Mktgmodule_Block_Adminhtml_Mktgmodule_Order extends Mage_Adminhtml_Block_Sales_Order_Abstract{
	public function getCustomVars(){
		$model = Mage::getModel('mktgmodule/mktgmodule_order');
		return $model->getByOrder($this->getOrder()->getId());
	}
}
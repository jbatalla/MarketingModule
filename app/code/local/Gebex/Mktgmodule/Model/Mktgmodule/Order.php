<?php
class Gebex_Mktgmodule_Model_Mktgmodule_Order extends Mage_Core_Model_Abstract{
	public function _construct()
	{
		parent::_construct();
		$this->_init('mktgmodule/mktgmodule_order');
	}
	public function deleteByOrder($order_id,$var){
		$this->_getResource()->deteleByOrder($order_id,$var);
	}
	public function getByOrder($order_id,$var = ''){
		return $this->_getResource()->getByOrder($order_id,$var);
	}
}
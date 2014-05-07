<?php
class Gebex_Mktgmodule_Model_Mktgmodule_Quote extends Mage_Core_Model_Abstract{
	public function _construct()
	{
		parent::_construct();
		$this->_init('mktgmodule/mktgmodule_quote');
	}
	public function deteleByQuote($quote_id,$var){
		$this->_getResource()->deteleByQuote($quote_id,$var);
	}
	public function getByQuote($quote_id,$var = ''){
		return $this->_getResource()->getByQuote($quote_id,$var);
	}
}
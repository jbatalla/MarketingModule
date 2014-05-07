<?php
class Gebex_Mktgmodule_Model_Observer{
	/**
	 * This function is called just before $quote object get stored to database.
	 * Here, from POST data, we capture our custom field and put it in the quote object
	 * @param unknown_type $evt
	 */
	public function saveQuoteBefore($evt){
		/*
		 $quote = $evt->getQuote();
		 $post = Mage::app()->getFrontController()->getRequest()->getPost();
		 if(isset($post['custom']['ssn'])){
			$var = $post['custom']['ssn'];
			$quote->setSsn($var);
			}
			*/
	}
	
	
	public function setMarketingValue($observer) {

		$quote = $observer->getEvent()->getQuote();
		$var = $quote->getMarketingLike();
		
		$squote = Mage::getModel('sales/quote')->load($quote->getId());
		$squote->setCompiereSearchKey($var);
		$squote->save();

		
	
	}
	
	
	public function addMarketingOrder($observer) {
	
	
		 $order = $observer->getEvent()->getOrder();
		  
		//$event = $observer->getEvent();
        //$_order = $event->getOrder();
		
		//$quote = $observer->getEvent()->getQuote();
		//$orderId = Mage::getSingleton('checkout/session')->getLastRealOrderId();
		//$order = $observer->getOrder();
		
		//$order1 = $observer->getEvent()->getOrder();
		$var = $order->getMarketingLike();
		
		$sorder = Mage::getModel('sales/order')->load($order->getId());
		$sorder->setCompiereSearchKey($var);
		$sorder->save();		
		
		//$sales_flat_order_table = Mage::getSingleton('core/resource')->getTableName('sales_flat_order');
		//$db = Mage::getSingleton('core/resource')->getConnection('core_write');
		//$qry = "UPDATE ".$sales_flat_order_table." SET compiere_search_key='".$var."' WHERE quote_id=".$quote->getId();
		//$db->query($qry);		
		
		
		
		
		
	}
	
	/**
	 * This function is called, just after $quote object get saved to database.
	 * Here, after the quote object gets saved in database
	 * we save our custom field in the our table created i.e sales_quote_custom
	 * @param unknown_type $evt
	 */
	public function saveQuoteAfter($evt){
		$quote = $evt->getQuote();
		if($quote->getSsn()){
			$var = $quote->getSsn();
			if(!empty($var)){
				$model = Mage::getModel('mktgmodule/mktgmodule_quote');
				$model->deteleByQuote($quote->getId(),'ssn');
				$model->setQuoteId($quote->getId());
				$model->setKey('ssn');
				$model->setValue($var);
				$model->save();
				
				//$sales_flat_quote_table = Mage::getSingleton('core/resource')->getTableName('sales_flat_quote');
				//$db = Mage::getSingleton('core/resource')->getConnection('core_write');
				//$qry = "UPDATE ".$sales_flat_quote_table." SET compiere_search_key='".serialize($var)."',compiere_campaign_name='".serialize($strExtra)."',magik_extrafee='".serialize($magikarr)."' WHERE item_id='$item_id'";
				//$qry = "UPDATE ".$sales_flat_quote_table." SET compiere_search_key='".serialize($var)."' WHERE entity_id=".$quote->getId();
				//$db->query($qry);
			}
		}
		if($quote->getMarketingLike()){
			$var = $quote->getMarketingLike();

			if(!empty($var)){
				$model = Mage::getModel('mktgmodule/mktgmodule_quote');
				$model->deteleByQuote($quote->getId(),'marketing_like');
				$model->setQuoteId($quote->getId());
				$model->setKey('marketing_like');
				$model->setValue($var);
				$model->save();
				
			}
		}
		if($quote->getMarketingLike2()){
			$var = $quote->getMarketingLike2();

			if(!empty($var)){
				$model = Mage::getModel('mktgmodule/mktgmodule_quote');
				$model->deteleByQuote($quote->getId(),'marketing_like2');
				$model->setQuoteId($quote->getId());
				$model->setKey('marketing_like2');
				$model->setValue($var);
				$model->save();
			}
		}
	}
	/**
	 *
	 * When load() function is called on the quote object,
	 * we read our custom fields value from database and put them back in quote object.
	 * @param unknown_type $evt
	 */
	public function loadQuoteAfter($evt){
		$quote = $evt->getQuote();
		$model = Mage::getModel('mktgmodule/mktgmodule_quote');
		$data = $model->getByQuote($quote->getId());
		foreach($data as $key => $value){
			$quote->setData($key,$value);
		}

		/*$test = Mage::getModel('sales/quote')->load($quote->getId());
		$test->setCompiereSearchKey($var);
		$test->save();*/				
		
	}
	/**
	 *
	 * This function is called after order gets saved to database.
	 * Here we transfer our custom fields from quote table to order table i.e sales_order_custom
	 * @param $evt
	 */
	public function saveOrderAfter($evt){
		$order = $evt->getOrder();
		$quote = $evt->getQuote();
		if($quote->getSsn()){
			$var = $quote->getSsn();
			if(!empty($var)){
				$model = Mage::getModel('mktgmodule/mktgmodule_order');
				$model->deleteByOrder($order->getId(),'ssn');
				$model->setOrderId($order->getId());
				$model->setKey('ssn');
				$model->setValue($var);
				$order->setSsn($var);
				$model->save();
				
				//$sales_flat_order_table = Mage::getSingleton('core/resource')->getTableName('sales_flat_order');
				//$db = Mage::getSingleton('core/resource')->getConnection('core_write');
				//$qry = "UPDATE ".$sales_flat_quote_table." SET compiere_search_key='".serialize($var)."',compiere_campaign_name='".serialize($strExtra)."',magik_extrafee='".serialize($magikarr)."' WHERE entity_id='$order->getId()'";
				//$qry = "UPDATE ".$sales_flat_order_table." SET compiere_search_key='".serialize($var)."' WHERE entity_id=".$order->getId();
				//$db->query($qry);		
				
					
			}
		}
		if($quote->getMarketingLike()){
			$var = $quote->getMarketingLike();
			if(!empty($var)){
				$model = Mage::getModel('mktgmodule/mktgmodule_order');
				$model->deleteByOrder($quote->getId(),'marketing_like');
				$model->setOrderId($order->getId());
				$model->setKey('marketing_like');
				$model->setValue($var);
				$model->save();
				
			}
		}
		if($quote->getMarketingLike2()){
			$var = $quote->getMarketingLike2();
			if(!empty($var)){
				$model = Mage::getModel('mktgmodule/mktgmodule_order');
				$model->deleteByOrder($quote->getId(),'marketing_like2');
				$model->setOrderId($order->getId());
				$model->setKey('marketing_like2');
				$model->setValue($var);
				$model->save();
			}
		}
	}
	/**
	 *
	 * This function is called when $order->load() is done.
	 * Here we read our custom fields value from database and set it in order object.
	 * @param unknown_type $evt
	 */
	public function loadOrderAfter($evt){
		$order = $evt->getOrder();
		$model = Mage::getModel('mktgmodule/mktgmodule_order');
		$data = $model->getByOrder($order->getId());
		foreach($data as $key => $value){
			$order->setData($key,$value);
		}

		/*$test = Mage::getModel('sales/order')->load($order->getId());
		$test->setCompiereSearchKey($var);
		$test->save();*/			
	}

}
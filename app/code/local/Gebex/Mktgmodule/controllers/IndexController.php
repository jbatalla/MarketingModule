<?php
class Gebex_Mktgmodule_IndexController extends Mage_Core_Controller_Front_Action
{
 
    public function indexAction()
    {
	
	/*from excellence module*/
	$this->loadLayout();     
	$this->renderLayout();
	/**/
	
	/*$this->loadLayout();
	$this->getLayout()
		->getBlock('content')->append(
			$this->getLayout()->createBlock('mktgmodule/view')
    	);
        $this->renderLayout();
    }*/
}
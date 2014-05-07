<?php
class Gebex_Mktgmodule_AdminController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
		$this->loadLayout()
			->_addContent($this->getLayout()->createBlock('mktgmodule/admin_main'))
			->renderLayout();
    }

    public function deleteAction()
    {
        $mktgId = $this->getRequest()->getParam('id', false);
				 
        try {
            Mage::getModel('mktgmodule/mktgmodule')->setId($mktgId)->delete();
            Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('mktgmodule')->__('Marketing project successfully deleted'));
            $this->getResponse()->setRedirect($this->getUrl('*/*/'));
 
            return;
        } catch (Exception $e){
            Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
        }
 
        $this->_redirectReferer();
    }

   public function newAction()
    {
        $this->loadLayout()
        ->_addContent($this->getLayout()->createBlock('mktgmodule/admin_new'))
        ->renderLayout();
    }
 
    public function postAction() //USE BY ADD NEW FOR
    {
        if ($data = $this->getRequest()->getPost()) {
			$this->_getSession()->setFormData($data);
		
			if($data['start_date'] != NULL ) {
                $data['start_date'] = date("y/m/d" ,strtotime($data['start_date']));
            }
            if($data['end_date'] != NULL){
                $data['end_date'] = date("y/m/d" ,strtotime($data['end_date']));
            }
			
            $mktgmodule = Mage::getModel('mktgmodule/mktgmodule')->setData($data);

            try {
                $mktgmodule->save();
                Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('mktgmodule')->__('Marketing project was successfully added'));
                $this->getResponse()->setRedirect($this->getUrl('*/*/'));
                return;
            } catch (Exception $e){
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
            }
        }
        $this->getResponse()->setRedirect($this->getUrl('*/*/'));
        return;
		//$this->_getSession()->addError($this__('No data found to save'));
    	//$this->_redirect('*/*');
    }

    public function editAction()
    {
        $this->loadLayout();
        $this->_addContent($this->getLayout()->createBlock('mktgmodule/admin_edit'));
        $this->renderLayout();
    }
 
    public function saveAction() //USE BY EDIT FORM
    {
        $mktgId = $this->getRequest()->getParam('id', false);
        if ($data = $this->getRequest()->getPost()) {
		
			if($data['start_date'] != NULL ) {
                $data['start_date'] = date("y/m/d" ,strtotime($data['start_date']));
            }
            if($data['end_date'] != NULL){
                $data['end_date'] = date("y/m/d" ,strtotime($data['end_date']));
            }
							
            $mktgmodule = Mage::getModel('mktgmodule/mktgmodule')->load($mktgId)->addData($data);
            try {
                $mktgmodule->setId($mktgId)->save();
 
                Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('mktgmodule')->__('Marketing project was saved successfully'));
                $this->getResponse()->setRedirect($this->getUrl('*/*/'));
                return;
            } catch (Exception $e){
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
            }
        }
        $this->_redirectReferer();
    }


}
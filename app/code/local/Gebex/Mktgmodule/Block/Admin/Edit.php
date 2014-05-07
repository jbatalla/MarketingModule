<?php
class Gebex_Mktgmodule_Block_Admin_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
 
        $this->_blockGroup = 'mktgmodule';
        $this->_mode = 'edit';
        $this->_controller = 'admin';
 
        if( $this->getRequest()->getParam($this->_objectId) ) {
            $mktgmoduleData = Mage::getModel('mktgmodule/mktgmodule')
                ->load($this->getRequest()->getParam($this->_objectId));
            Mage::register('frozen_mktgmodule', $mktgmoduleData);
        }
    }
 
    public function getHeaderText()
    {
        return Mage::helper('mktgmodule')->__("Edit Marketing Project'%s'", $this->htmlEscape(Mage::registry('frozen_mktgmodule')->getName()));
    }
}
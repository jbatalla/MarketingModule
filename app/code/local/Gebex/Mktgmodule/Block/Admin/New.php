<?php
class Gebex_Mktgmodule_Block_Admin_New extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
 
        $this->_blockGroup = 'mktgmodule';
        $this->_mode = 'new';
        $this->_controller = 'admin';
    }
 
    public function getHeaderText()
    {
        return Mage::helper('mktgmodule')->__('Add New Marketing Project');
    }
}
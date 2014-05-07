<?php
class Gebex_Mktgmodule_Block_Admin_Main extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        parent::__construct();
		
		$this->_controller = 'admin_main';
		$this->_blockGroup = 'mktgmodule';
		$this->_headerText = Mage::helper('mktgmodule')->__('Campaign Project(s)');
		$this->_addButtonLabel = Mage::helper('mktgmodule')->__('Add New Project');  
                
    }
	
	protected function _prepareLayout()
    {
        $this->setChild( 'grid',
            $this->getLayout()->createBlock( $this->_blockGroup.'/' . $this->_controller . '_grid',
            $this->_controller . '.grid')->setSaveParametersInSession(true) );
        return parent::_prepareLayout();
    }
}
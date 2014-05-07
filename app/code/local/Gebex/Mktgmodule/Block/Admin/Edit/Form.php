<?php
class Gebex_Mktgmodule_Block_Admin_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
    protected function _prepareForm()
    {
      $form = new Varien_Data_Form(array(
               'id' => 'edit_form',
              'action' => $this->getUrl('*/*/save', array('id' =>    $this->getRequest()->getParam('id'))),
              'method' => 'post',
              'enctype' => 'multipart/form-data'
         )
       );		
	   $this->setForm($form);
	   //$dateFormatIso = Mage::app()->getLocale()->getDateTimeFormat(Mage_Core_Model_Locale::FORMAT_TYPE_SHORT);
	   $dateFormatIso = Mage::app()->getLocale()->getDateFormat(Mage_Core_Model_Locale::FORMAT_TYPE_SHORT);
 
 
	   $fieldset = $form->addFieldset('edit_mktgmodule', array('legend' => Mage::helper('mktgmodule')->__('Project Details')));
		
		$fieldset->addField('compiere_search_key', 'text', array(
			'name'      => 'compiere_search_key',
			'title'     => Mage::helper('mktgmodule')->__('Compiere Search Key'),
			'label'     => Mage::helper('mktgmodule')->__('Compiere Search Key'),
			'style'     => 'width: 155px;',
			'class' 	=> 'required-entry',	
			'maxlength' => '100',
			'required'  => true,
		));
		
		$fieldset->addField('compiere_campaign_name', 'text', array(
			'name'      => 'compiere_campaign_name',
			'title'     => Mage::helper('mktgmodule')->__('Campaign Name'),
			'label'     => Mage::helper('mktgmodule')->__('Campaign Name'),
			'style'     => 'width: 300px;',
			'maxlength' => '255',
			'class' 	=> 'required-entry',				
			'required'  => true,
		));			
			
		$fieldset->addField('display_text', 'text', array(
			'name'      => 'display_text',
			'title'     => Mage::helper('mktgmodule')->__('Display Text'),
			'label'     => Mage::helper('mktgmodule')->__('Display Text'),
			'style'     => 'width: 300px;',
			'maxlength' => '255',
			'class' 	=> 'required-entry',				
			'required'  => true,
		));	

		$fieldset->addField('start_date', 'date', array(
			'name'      => 'start_date',
			'title'     => Mage::helper('mktgmodule')->__('Start Date'),
			'label'     => Mage::helper('mktgmodule')->__('Start Date'),
			'style'     => 'width: 150px;',
			'image'  	=> $this->getSkinUrl('images/grid-cal.gif'),
      		'input_format' => Varien_Date::DATE_INTERNAL_FORMAT,
          	'format'       => $dateFormatIso,
		  	/*'time' 		=> true,*/		
			'maxlength' => '150',
			'class' 	=> 'required-entry',				
			'required'  => true,
		));	
		
		$fieldset->addField('end_date', 'date', array(
			'name'      => 'end_date',
			'title'     => Mage::helper('mktgmodule')->__('End Date'),
			'label'     => Mage::helper('mktgmodule')->__('End Date'),
			'style'     => 'width: 150px;',
			'image'  	=> $this->getSkinUrl('images/grid-cal.gif'),
      		'input_format' => Varien_Date::DATE_INTERNAL_FORMAT,
          	'format'       => $dateFormatIso,
			/*'time' 		=> true,*/
			'maxlength' => '150',
			'class' 	=> 'required-entry',				
			'required'  => true,
		));	

		$fieldset->addField('is_active', 'select', array(
			'name'      => 'is_active',
			'title'     => Mage::helper('mktgmodule')->__('Status'),
			'label'     => Mage::helper('mktgmodule')->__('Status'),
			'maxlength' => '50',
			'class' 	=> 'required-entry',				
			'required'  => true,
			'style'     => 'width: 155px;',
			'options'    => array(
                 'Yes' => Mage::helper('mktgmodule')->__('Active'),
                 'No' => Mage::helper('mktgmodule')->__('Inactive'),
             ),
		));	
				
		#gebana dev database 'content' as fieldname 	  
		/*$fieldset->addField('content', 'textarea', array(
			'name'      => 'content',
			'title'     => Mage::helper('mktgmodule')->__('Beschreibung'),
			'label'     => Mage::helper('mktgmodule')->__('Beschreibung'),
			'style'     => 'width: 98%; height: 200px;',
			'required'  => false,
		));	*/		  
 
        $form->setUseContainer(true);
        $form->setValues(Mage::registry('frozen_mktgmodule')->getData());
        //$this->setForm($form);
        return parent::_prepareForm();
    }
}
<?php
class Gebex_Mktgmodule_Block_Admin_Main_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
 
    public function __construct()
    {
        parent::__construct();
        $this->setId('mktgmoduleGrid');
        $this->_controller = 'mktgmodule';
		
		/*parent::__construct();
		$this->setId('mktgmoduleGrid');
		$this->setDefaultSort('mktg_id');
		$this->setDefaultDir('ASC');*/
		$this->setSaveParametersInSession(true);
		
		/*parent::__construct();
        $this->setId('mktgmoduleGrid');
        $this->_controller = 'mktgmodule';*/
    }
 
    protected function _prepareCollection()
    {
        /*$model = Mage::getModel('mktgmodule/mktgmodule');
        $collection = $model->getCollection();
		$this->setCollection($collection); 
        return parent::_prepareCollection();*/
		
		$collection = Mage::getModel('mktgmodule/mktgmodule')->getCollection();
		$this->setCollection($collection);
		return parent::_prepareCollection();		
    }
 
    protected function _prepareColumns()
    {
        $this->addColumn('mktg_id', array(
            'header'        => Mage::helper('mktgmodule')->__('ID'),
            'align'         => 'left',
            'width'         => '30px',
            /*'filter_index'  => 'dt.mktg_id',*/
            'index'         => 'mktg_id',
        ));
 		
        $this->addColumn('compiere_search_key', array(
            'header'        => Mage::helper('mktgmodule')->__('Compiere Search Key'),
            'align'         => 'left',
            'width'         => '150px',
            /*'filter_index'  => 'dt.compiere_search_key',*/
            'index'         => 'compiere_search_key',
            /*'type'          => 'text',*/
            'truncate'      => 150,
            'escape'        => true,
        ));

        $this->addColumn('compiere_campaign_name', array(
            'header'        => Mage::helper('mktgmodule')->__('Compiere Campaign Name'),
            'align'         => 'left',
            'width'         => '200px',
            /*'filter_index'  => 'dt.compiere_campaign_name',*/
            'index'         => 'compiere_campaign_name',
            /*'type'          => 'text',*/
            'truncate'      => 150,
            'escape'        => true,
        ));		

        $this->addColumn('display_text', array(
            'header'        => Mage::helper('mktgmodule')->__('Display Text'),
            'align'         => 'left',
            'width'         => '200px',
            /*'filter_index'  => 'dt.display_text',*/
            'index'         => 'display_text',
            /*'type'          => 'text',*/
            'truncate'      => 150,
            'escape'        => true,
        ));	
		 
        $this->addColumn('start_date', array(
            'header'        => Mage::helper('mktgmodule')->__('Start Date'),
            'align'         => 'left',
            /*'filter_index'  => 'dt.start_date',*/
            'index'         => 'start_date',
            'type'          => 'datetime',
			'format' 		=> 'MMM d, y',
        ));

        $this->addColumn('end_date', array(
            'header'        => Mage::helper('mktgmodule')->__('End Date'),
            'align'         => 'left',
           /* 'filter_index'  => 'dt.end_date',*/
            'index'         => 'end_date',
            'type'          => 'datetime',
			'format' 		=> 'MMM d, y',
        ));
		
        $this->addColumn('is_active', array(
            'header'        => Mage::helper('mktgmodule')->__('Status'),
            'align'         => 'left',
            /*'filter_index'  => 'dt.is_active',*/
            'index'         => 'is_active',
            'type'          => 'options',
			'options' 		=> array('Yes' => 'Active', 'No' => 'Inactive'),
        ));
				 
        $this->addColumn('action',
            array(
                'header'    => Mage::helper('mktgmodule')->__('Action'),
                'width'     => '150px',
                'type'      => 'action',
                'getter'	=> 'getId',
                'actions'   => array(
                    array(
                        'caption' => Mage::helper('mktgmodule')->__('Edit'),
                        'url'     => array(
                            'base'=>'*/*/edit'
                         ),
                         'field'   => 'id'
                    ),
                    array(
                        'caption' => Mage::helper('mktgmodule')->__('Delete'),
                        'url'     => array(
                            'base'=>'*/*/delete'
                         ),
                         'field'   => 'id'
                    )
                ),
                'filter'    => false,
                'sortable'  => false
        ));
 
        return parent::_prepareColumns();
    }
 
    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', array(
            'id' => $row->getMktgId(),
        ));
    }
}
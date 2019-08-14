<?php
class Biztech_Desktopnotification_Block_Adminhtml_Desktopnotification extends Mage_Adminhtml_Block_Widget_Grid_Container
{
  public function __construct()
  {
    $this->_controller = 'adminhtml_desktopnotification';
    $this->_blockGroup = 'desktopnotification';
    $this->_headerText = Mage::helper('desktopnotification')->__('Item Manager');
    $this->_addButtonLabel = Mage::helper('desktopnotification')->__('Add Item');
    parent::__construct();
  }
}
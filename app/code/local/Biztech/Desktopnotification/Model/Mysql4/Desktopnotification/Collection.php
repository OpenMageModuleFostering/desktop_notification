<?php

class Biztech_Desktopnotification_Model_Mysql4_Desktopnotification_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('desktopnotification/desktopnotification');
    }
}
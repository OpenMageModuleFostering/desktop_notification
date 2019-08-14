<?php

class Biztech_Desktopnotification_Model_Mysql4_Desktopnotification extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {    
        // Note that the desktopnotification_id refers to the key field in your database table.
        $this->_init('desktopnotification/desktopnotification', 'desktopnotification_id');
    }
}
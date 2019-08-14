<?php

class Biztech_Desktopnotification_Model_Desktopnotification extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('desktopnotification/desktopnotification');
    }
}
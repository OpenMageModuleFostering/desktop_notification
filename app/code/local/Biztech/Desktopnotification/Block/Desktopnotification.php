<?php
class Biztech_Desktopnotification_Block_Desktopnotification extends Mage_Core_Block_Template
{
	public function _prepareLayout()
    {
		return parent::_prepareLayout();
    }
    
     public function getDesktopnotification()     
     { 
        if (!$this->hasData('desktopnotification')) {
            $this->setData('desktopnotification', Mage::registry('desktopnotification'));
        }
        return $this->getData('desktopnotification');
        
    }
}
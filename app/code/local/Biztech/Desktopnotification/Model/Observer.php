<?php
    /**
     * Observer class for Supplier module
     */
    class Biztech_Desktopnotification_Model_Observer
    {
        /**
         * this function will insert the order if in desktop notification table that will further notify the admin that order is placed.
         */
        public function desktopnotification(Varien_Event_Observer $observer)
        {
            //check whether order notification module is enable or disabled & call different template according to that - added by BC(NR)
            $getModuleStatus = Mage::getStoreConfig('desktopnotification/enablemodule/enable_notifications');

            /* if module is enabled than only it will enter the order in database for desktop notification */
            if($getModuleStatus == '1') {
                $orderDate = date("Y-m-d h:i:m");
                $model     = Mage::getModel('desktopnotification/desktopnotification');
                
                $model->setIncrementId($observer->getOrder()->getIncrementId())
                        ->setNotifiyFlag(0)
                        ->setOrderDatetime($orderDate);
                
                $model->save();
            }
        }
    }
?>
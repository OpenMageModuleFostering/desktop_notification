<?php

    class Biztech_Desktopnotification_Adminhtml_DesktopnotificationController extends Mage_Adminhtml_Controller_Action
    {
        /* function will get pending orders for notification and pass as json array */
        public function indexAction() {
            $ff = $this->getRequest()->getParam('firefox');
            if($ff == 1) {
                $getOrderCollection = Mage::getModel('desktopnotification/desktopnotification')->getCollection()
                ->addFieldToFilter('notify_flag','0')
                ->setPageSize(1);
            }
            else {
                $getOrderCollection = Mage::getModel('desktopnotification/desktopnotification')->getCollection()
                ->addFieldToFilter('notify_flag','0')
                ->setPageSize(3);
            }

            $getOrderData = $getOrderCollection->getData();

            for($i=0;$i<count($getOrderData);$i++)
            {
                $getOrdEntID  = Mage::getModel('sales/order')->getCollection()
                ->addFieldToFilter('increment_id',$getOrderData[$i]['increment_id'])
                ->getFirstItem();
                $getNotifyMsg = Mage::getStoreConfig('desktopnotification/notificationmessage/message',$getOrdEntID->getStoreId());
                if(Mage::getStoreConfig('desktopnotification/uploadicon/upload_notification_icon')) { 
                    $icon =  Mage::getBaseUrl('media')."bcdesktopnotification/icon/".Mage::getStoreConfig('desktopnotification/uploadicon/upload_notification_icon',$getOrdEntID->getStoreId()); 
                } else { 
                    $icon = $this->getSkinUrl('favicon.ico');
                }

                $getOrdViewUrl= Mage::getUrl('adminhtml/sales_order/view',array('order_id'=>$getOrdEntID->getId()));
                $jsonArray[] = array('increment_id'=>$getOrderData[$i]['increment_id'],'notification_message'=>$getNotifyMsg,'id'=>$getOrderData[$i]['desktopnotification_id'],'order_url'=>$getOrdViewUrl,'icon'=>$icon);
            }
            $jsonData = json_encode($jsonArray);
            $this->getResponse()->setHeader('Content-type', 'application/json');
            $this->getResponse()->setBody($jsonData);

        }

        /* function will update the notify flag after notification is displayed */
        public function userAction()
        {
            $id = $this->getRequest()->getParam('id');
            $model = Mage::getModel('desktopnotification/desktopnotification')->load($id)->addData(array('notify_flag'=>1));
            try {
                $model->setDesktopnotificationId($id)->save();
            }catch(Exception $e) {
                $e->getMessage(); 
            }
        }

        protected function _isAllow(){
            return true;
        }
}
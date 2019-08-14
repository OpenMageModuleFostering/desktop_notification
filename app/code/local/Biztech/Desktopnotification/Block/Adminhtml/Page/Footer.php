<?php
class Biztech_Desktopnotification_Block_Adminhtml_Page_Footer extends Mage_Adminhtml_Block_Template
{
    const LOCALE_CACHE_LIFETIME = 7200;
    const LOCALE_CACHE_KEY      = 'footer_locale';
    const LOCALE_CACHE_TAG      = 'adminhtml';

    protected function _construct()
    {       
        //check whether order notification module is enable or disabled & call different template according to that - added by BC(NR)
        $getModuleStatus = Mage::getStoreConfig('desktopnotification/enablemodule/enable_notifications');
        if($getModuleStatus == '1')
            $this->setTemplate('desktopnotification/footer.phtml');
        else
            $this->setTemplate('page/footer.phtml');
        
        $this->setShowProfiler(true);
    }

    public function getChangeLocaleUrl()
    {
        return $this->getUrl('adminhtml/index/changeLocale');
    }

    public function getUrlForReferer()
    {
        return $this->getUrlEncoded('*/*/*',array('_current'=>true));
    }

    public function getRefererParamName()
    {
        return Mage_Core_Controller_Varien_Action::PARAM_NAME_URL_ENCODED;
    }

    public function getLanguageSelect()
    {
        $locale  = Mage::app()->getLocale();
        $cacheId = self::LOCALE_CACHE_KEY . $locale->getLocaleCode();
        $html    = Mage::app()->loadCache($cacheId);

        if (!$html) {
            $html = $this->getLayout()->createBlock('adminhtml/html_select')
                ->setName('locale')
                ->setId('interface_locale')
                ->setTitle(Mage::helper('page')->__('Interface Language'))
                ->setExtraParams('style="width:200px"')
                ->setValue($locale->getLocaleCode())
                ->setOptions($locale->getTranslatedOptionLocales())
                ->getHtml();
            Mage::app()->saveCache($html, $cacheId, array(self::LOCALE_CACHE_TAG), self::LOCALE_CACHE_LIFETIME);
        }

        return $html;
    }
}

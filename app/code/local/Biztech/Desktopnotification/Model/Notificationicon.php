<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magento.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magento.com for more information.
 *
 * @category    Mage
 * @package     Mage_Adminhtml
 * @copyright  Copyright (c) 2006-2014 X.commerce, Inc. (http://www.magento.com)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */


/**
 * System config image field backend model for Zend PDF generator
 *
 * @category   Mage
 * @package    Mage_Adminhtml
 * @author     Magento Core Team <core@magentocommerce.com>
 */
class Biztech_Desktopnotification_Model_Notificationicon extends Mage_Adminhtml_Model_System_Config_Backend_Image
{
    /**
     * The tail part of directory path for uploading
     *
     */
    const UPLOAD_DIR = 'bcdesktopnotification/icon';

    /**
     * Token for the root part of directory path for uploading
     *
     */
    const UPLOAD_ROOT = 'media';

    /**
     * Return path to directory for upload file
     *
     * @return string
     * @throw Mage_Core_Exception
     */
    protected function _getUploadDir()
    {
        $uploadDir = $this->_appendScopeInfo(self::UPLOAD_DIR);
        $uploadRoot = $this->_getUploadRoot(self::UPLOAD_ROOT);
        $uploadDir = $uploadRoot . '/' . $uploadDir;
        return $uploadDir;
    }

    /**
     * Makes a decision about whether to add info about the scope.
     *
     * @return boolean
     */
    protected function _addWhetherScopeInfo()
    {
        return true;
    }

    /**
     * Getter for allowed extensions of uploaded files.
     *
     * @return array
     */
    protected function _getAllowedExtensions()
    {
        return array('ico', 'png', 'gif', 'jpg', 'jpeg', 'apng', 'svg');
    }

    /**
     * Get real media dir path
     *
     * @param  $token
     * @return string
     */
    protected function _getUploadRoot($token) {
        return Mage::getBaseDir($token);
    }
}

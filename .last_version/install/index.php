<?php
/**
 * GercPay Payment Module
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 *
 * @category  GercPay
 * @package   gercpay.payment
 * @version   1.0.0
 * @author    GercPay
 * @copyright Copyright (c) 2021 GercPay
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 *
 * EXTENSION INFORMATION
 *
 * 1C-Bitrix      20.300
 * GercPay API https://api.gercpay.com.ua/
 *
 */

use Bitrix\Main\Localization\Loc;
use Bitrix\Main\Config\Option;

IncludeModuleLangFile(__FILE__);

/**
 * Class gercpay_payment
 */
class gercpay_payment extends CModule
{
    const MODULE_ID    = 'gercpay.payment';
    const PARTNER_NAME = 'gercpay';
    const PARTNER_URI  = 'https://gercpay.com.ua';

    /** @var string */
    var $MODULE_ID = 'gercpay.payment';

    /** @var string */
    var $PARTNER_NAME = 'gercpay';

    /** @var string */
    var $PARTNER_URI = 'https://gercpay.com.ua';

    /** @var string */
    var $MODULE_GROUP_RIGHTS = 'N';

    /**
     * gercpay_payment constructor.
     */
    public function __construct()
    {
        require(__DIR__ . '/version.php');
        $this->MODULE_NAME         = GetMessage('CP_MODULE_NAME');
        $this->MODULE_DESCRIPTION  = GetMessage('CP_MODULE_DESC');
        $this->MODULE_VERSION      = $arModuleVersion['VERSION'];
        $this->MODULE_VERSION_DATE = $arModuleVersion['VERSION_DATE'];
        $this->PARTNER_NAME        = 'gercpay';
        $this->PARTNER_URI         = 'https://gercpay.com.ua';
    }

    /**
     * Install module.
     *
     * @return boolean
     */
    public function DoInstall()
    {
        if (IsModuleInstalled('sale')) {
            global $APPLICATION;
            $this->InstallFiles();
            RegisterModule($this->MODULE_ID);
            return true;
        }

        $MODULE_ID = $this->MODULE_ID;
        $TAG = 'VWS';
        $MESSAGE = GetMessage('CP_ERR_MODULE_NOT_FOUND', array('#MODULE#' => 'sale'));
        $intID = CAdminNotify::Add(compact('MODULE_ID', 'TAG', 'MESSAGE'));

        return false;
    }

    /**
     * Uninstall module.
     *
     * @return void
     */
    public function DoUninstall()
    {
        global $APPLICATION;
        COption::RemoveOption($this->MODULE_ID);
        UnRegisterModule($this->MODULE_ID);
        $this->UnInstallFiles();
    }

    /**
     * Install module files.
     *
     * @return void
     */
    public function InstallFiles()
    {
        CopyDirFiles(
            $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/' . $this->MODULE_ID . '/install/sale_payment',
            $_SERVER['DOCUMENT_ROOT'] . '/bitrix/php_interface/include/sale_payment',
            true,
            true
        );
        CopyDirFiles(
            $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/' . $this->MODULE_ID . '/install/tools',
            $_SERVER['DOCUMENT_ROOT'] . '/bitrix/tools',
            true,
            true
        );
        CopyDirFiles(
            $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/' . $this->MODULE_ID . '/install/images',
            $_SERVER['DOCUMENT_ROOT'] . '/bitrix/images/sale/sale_payments/'
        );
    }

    /**
     * Uninstall module files.
     *
     * @return boolean
     */
    public function UnInstallFiles()
    {
        DeleteDirFilesEx('/bitrix/php_interface/include/sale_payment/gercpay_payment');
        DeleteDirFilesEx('/bitrix/tools/gercpay_payment');
        DeleteDirFilesEx('/bitrix/images/sale/sale_payments/gercpay.png');
        return true;
    }
}

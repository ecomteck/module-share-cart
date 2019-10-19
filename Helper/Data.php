<?php
/**
 * Ecomteck
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Ecomteck.com license that is
 * available through the world-wide-web at this URL:
 * https://www.ecomteck.com/LICENSE.txt
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this extension to newer
 * version in the future.
 *
 * @category    Ecomteck
 * @package     Ecomteck_ShareCart
 * @copyright   Copyright (c) Ecomteck (https://www.ecomteck.com/)
 * @license     https://www.ecomteck.com/LICENSE.txt
 */

namespace Ecomteck\ShareCart\Helper;

use Ecomteck\Core\Helper\AbstractData;

/**
 * Class Data
 * @package Ecomteck\ShareCart\Helper
 */
class Data extends AbstractData
{
    const CONFIG_MODULE_PATH   = 'sharecart';
    const BUSINESS_CONFIG_PATH = 'business_information';

    /**
     * @return bool
     */
    public function isDisabled()
    {
        return !$this->isEnabled();
    }

    /**
     * @param null $storeId
     * @return array|mixed
     */
    public function getCompanyName($storeId = null)
    {
        return $this->getModuleConfig(self::BUSINESS_CONFIG_PATH . '/company', $storeId);
    }

    /**
     * @param null $storeId
     * @return array|mixed
     */
    public function getAddress($storeId = null)
    {
        return $this->getModuleConfig(self::BUSINESS_CONFIG_PATH . '/address', $storeId);
    }

    /**
     * @param null $storeId
     * @return array|mixed
     */
    public function getVATNumber($storeId = null)
    {
        return $this->getModuleConfig(self::BUSINESS_CONFIG_PATH . '/vat_number', $storeId);
    }

    /**
     * @param null $storeId
     * @return array|mixed
     */
    public function getPhone($storeId = null)
    {
        return $this->getModuleConfig(self::BUSINESS_CONFIG_PATH . '/phone', $storeId);
    }

    /**
     * @param null $storeId
     * @return array|mixed
     */
    public function getEmail($storeId = null)
    {
        return $this->getModuleConfig(self::BUSINESS_CONFIG_PATH . '/contact', $storeId);
    }

    /**
     * @param null $storeId
     * @return array|mixed
     */
    public function getRegisteredNumber($storeId = null)
    {
        return $this->getModuleConfig(self::BUSINESS_CONFIG_PATH . '/registered', $storeId);
    }

    /**
     * @param null $storeId
     * @return array|mixed
     */
    public function getWarningMessage($storeId = null)
    {
        return $this->getModuleConfig(self::BUSINESS_CONFIG_PATH . '/message', $storeId);
    }
}

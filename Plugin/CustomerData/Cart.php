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

namespace Ecomteck\ShareCart\Plugin\CustomerData;

use Magento\Checkout\Model\Session;
use Magento\Framework\UrlInterface;
use Ecomteck\Core\Helper\AbstractData;

/**
 * Class Cart
 * @package Ecomteck\ShareCart\Plugin\CustomerData
 */
class Cart
{
    /**
     * @var \Magento\Customer\Model\Session
     */
    protected $checkoutSession;

    /**
     * @var \Magento\Quote\Model\Quote|null
     */
    protected $quoteId = null;

    /**
     * @var \Ecomteck\Core\Helper\AbstractData
     */
    protected $helperData;

    /**
     * Url Builder
     *
     * @var UrlInterface
     */
    protected $_urlBuilder;

    /**
     * Cart constructor.
     * @param AbstractData $helperData
     * @param Session $checkoutSession
     * @param UrlInterface $urlBuilder
     */
    public function __construct(
        AbstractData $helperData,
        Session $checkoutSession,
        UrlInterface $urlBuilder
    )
    {
        $this->checkoutSession = $checkoutSession;
        $this->helperData      = $helperData;
        $this->_urlBuilder     = $urlBuilder;
    }

    /**
     * Add Url data to result
     *
     * @param \Magento\Checkout\CustomerData\Cart $subject
     * @param $result
     * @return mixed
     */
    public function afterGetSectionData(\Magento\Checkout\CustomerData\Cart $subject, $result)
    {
        if (null === $this->quoteId) {
            $this->quoteId = $this->checkoutSession->getQuoteId();
        }
        $result['quote_url'] = $this->_urlBuilder->getUrl('sharecart', ['key' => base64_encode($this->quoteId)]);

        return $result;
    }
}

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
define([
    'jquery',
    'uiComponent',
    'Magento_Customer/js/customer-data',
    'mage/translate'
], function ($, Component, customerData, $t) {
    'use strict';

    var isReload = true;
    return Component.extend({
        defaults: {
            template: 'Ecomteck_ShareCart/minicart'
        },

        initialize: function () {
            this._super();

            if (isReload) {
                customerData.reload(['cart'], false);
                isReload = false;
            }
            this.customer = customerData.get('cart');
        },

        getQuoteId: function () {
            return customerData.get('cart')().quote_url;
        },

        copyQuote: function (object, e) {
            const quoteUrl = document.createElement('textarea');
            quoteUrl.value = customerData.get('cart')().quote_url;
            document.body.appendChild(quoteUrl);
            quoteUrl.select();
            document.execCommand('copy');
            document.body.removeChild(quoteUrl);

            e.currentTarget.setAttribute('class', 'mp-tooltipped');
            e.currentTarget.setAttribute('aria-label', $t('Copied!'));
        },

        leaveQuote: function (object, e) {
            e.currentTarget.removeAttribute('class');
            e.currentTarget.removeAttribute('aria-label');
        },

        isDisplay: function () {
            return customerData.get('cart')().summary_count;
        }
    });
});

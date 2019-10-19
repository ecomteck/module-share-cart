<?php
/**
 * Ecomteck
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the ecomteck.com license that is
 * available through the world-wide-web at this URL:
 * https://ecomteck.com/LICENSE.txt
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this extension to newer
 * version in the future.
 *
 * @category    Ecomteck
 * @package     Ecomteck_ShareCart
 * @copyright   Copyright (c) 2019 Ecomteck (https://ecomteck.com/)
 * @license     https://ecomteck.com/LICENSE.txt
 */

namespace Ecomteck\ShareCart\Setup;

use Magento\Framework\DB\Adapter\AdapterInterface;

class InstallSchema implements \Magento\Framework\Setup\InstallSchemaInterface
{
    /**
     * install tables
     *
     * @param \Magento\Framework\Setup\SchemaSetupInterface $setup
     * @param \Magento\Framework\Setup\ModuleContextInterface $context
     * @return void
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    public function install(
        \Magento\Framework\Setup\SchemaSetupInterface $setup,
        \Magento\Framework\Setup\ModuleContextInterface $context
    ) {
        $installer = $setup;
        $installer->startSetup();

        $eavTable = $installer->getTable('quote');

        $columns = [
            'sharecart_id' => [
                'type' => \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                'length' => 12,
                'nullable' => true,
                'comment' => 'Share Cart ID'
            ]
        ];
        $connection = $installer->getConnection();
        foreach ($columns as $name => $definition) {
            $connection->addColumn($eavTable, $name, $definition);
        }

        /**
         * Create table 'ecomteck_share_cart'
         */
        $table = $installer->getConnection()
            ->newTable($installer->getTable('ecomteck_share_cart'))
            ->addColumn(
                'entity_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                12,
                ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                'Share id'
            )
            ->addColumn(
                'quote_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['unsigned' => true],
                'Quote Id'
            )
            ->addColumn(
                'share_code',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                100,
                ['nullable' => false],
                'Share code'
            )
            ->addColumn(
                'commission',
                \Magento\Framework\DB\Ddl\Table::TYPE_DECIMAL,
                '12,4',
                ['nullable' => false, 'default' => '0.0000'],
                'Quote Commission'
            )
            ->addColumn(
                'share_comment',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                '64k',
                [],
                'Share comment'
            )
            ->addColumn(
                'from_customer_name',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                200,
                ['nullable' => true],
                'From Customer Name'
            )
            ->addColumn(
                'from_customer_email',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                200,
                ['nullable' => true],
                'From Customer Email'
            )
            ->addColumn(
                'from_customer_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['unsigned' => true, 'nullable' => true, 'default' => 0],
                'From Customer ID'
            )
            ->addColumn(
                'to_email',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                200,
                ['nullable' => true],
                'To Customer Email'
            )
            ->addColumn(
                'to_phone',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                200,
                ['nullable' => true],
                'To Phone Number'
            )
            ->addColumn(
                'share_link',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                200,
                ['nullable' => true],
                'Share link'
            )
            ->addColumn(
                'store_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                null,
                ['unsigned' => true, 'default' => '0'],
                'share cart in the store id'
            )
            ->addColumn(
                'method',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                100,
                ['nullable' => true, 'default'=>'email'],
                'Share link method'
            )
            ->addColumn(
                'number_clicked',
                \Magento\Framework\DB\Ddl\Table::TYPE_BIGINT,
                null,
                ['unsigned' => true, 'default' => 0],
                'numbers of click'
            )
            ->addColumn(
                'status',
                \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                null,
                ['unsigned' => true, 'default' => 1],
                'status'
            )
            ->addColumn(
                'created_at',
                \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
                null,
                ['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT],
                'Share Cart create date'
            )
            ->setComment('Share Cart table');
        $installer->getConnection()->createTable($table);
        
        /**
         * Create table 'ecomteck_convert_cart'
         */
        $table = $installer->getConnection()
            ->newTable($installer->getTable('ecomteck_convert_cart'))
            ->addColumn(
                'entity_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                12,
                ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                'Share id'
            )
            ->addColumn(
                'quote_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['unsigned' => true],
                'Quote Id'
            )
            ->addColumn(
                'order_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['unsigned' => true],
                'Order Id'
            )
            ->addColumn(
                'share_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['unsigned' => true],
                'Share Id'
            )
            ->addColumn(
                'commission',
                \Magento\Framework\DB\Ddl\Table::TYPE_DECIMAL,
                '12,4',
                ['nullable' => false, 'default' => '0.0000'],
                'Quote Commission'
            )
            ->addColumn(
                'grand_total',
                \Magento\Framework\DB\Ddl\Table::TYPE_DECIMAL,
                '12,4',
                ['nullable' => false, 'default' => '0.0000'],
                'Order Grand Total'
            )
            ->addColumn(
                'from_customer_name',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                200,
                ['nullable' => true],
                'From Customer Name'
            )
            ->addColumn(
                'from_customer_email',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                200,
                ['nullable' => true],
                'From Customer Email'
            )
            ->addColumn(
                'from_customer_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['unsigned' => true, 'nullable' => true, 'default' => 0],
                'From Customer ID'
            )
            ->addColumn(
                'customer_email',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                200,
                ['nullable' => true],
                'To Customer Email'
            )
            ->addColumn(
                'customer_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['unsigned' => true, 'nullable' => true, 'default' => 0],
                'Customer ID'
            )
            ->addColumn(
                'store_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                null,
                ['unsigned' => true, 'default' => '0'],
                'purchase from store id'
            )
            ->addColumn(
                'status',
                \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                null,
                ['unsigned' => true, 'default' => 1],
                'order status'
            )
            ->addColumn(
                'created_at',
                \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
                null,
                ['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT],
                'purcahsed date'
            )
            ->setComment('Conversion Cart table');
        $installer->getConnection()->createTable($table);
        $installer->endSetup();
    }
}

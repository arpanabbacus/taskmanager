<?php


namespace Magemonkeys\Taskmanager\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface
{

    /**
     * {@inheritdoc}
     */
    public function install(
        SchemaSetupInterface $setup,
        ModuleContextInterface $context
    ) {
        //Your install script

        $table_magemonkeys_taskmanager_tasks = $setup->getConnection()->newTable($setup->getTable('magemonkeys_taskmanager_tasks'));

        $table_magemonkeys_taskmanager_tasks->addColumn(
            'tasks_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            ['identity' => true,'nullable' => false,'primary' => true,'unsigned' => true,],
            'Entity ID'
        );

        $table_magemonkeys_taskmanager_tasks->addColumn(
            'name',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            [],
            'name'
        );

        $table_magemonkeys_taskmanager_tasks->addColumn(
            'description',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            null,
            ['nullable' => False],
            'description'
        );

        $table_magemonkeys_taskmanager_tasks->addColumn(
            'starttime',
            \Magento\Framework\DB\Ddl\Table::TYPE_DATETIME,
            null,
            [],
            'starttime'
        );

        $table_magemonkeys_taskmanager_tasks->addColumn(
            'endtime',
            \Magento\Framework\DB\Ddl\Table::TYPE_DATETIME,
            null,
            [],
            'endtime'
        );

        $table_magemonkeys_taskmanager_tasks->addColumn(
            'assigneename',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            [],
            'assigneename'
        );

        $table_magemonkeys_taskmanager_tasks->addColumn(
            'status',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            ['nullable' => False],
            'status'
        );

        $setup->getConnection()->createTable($table_magemonkeys_taskmanager_tasks);
    }
}

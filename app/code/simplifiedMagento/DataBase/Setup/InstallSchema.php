<?php

namespace simplifiedMagento\Database\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;

class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        $table = $setup->getConnection()->newTable($setup->getTable('masenko'))
            ->addColumn('entity_id', Table::TYPE_INTEGER, null, ['identity' => true, 'nullable' => false, 'primary' => true], 'MEMBER_ID')
            ->addColumn('name', Table::TYPE_TEXT, 255, ['nullable' => false], 'NAME_OF_MEMBER')
            ->addColumn('address', Table::TYPE_TEXT, 255, ['nullable' => false], 'ADDRESS_OF_MEMBER')
            ->addColumn('status', Table::TYPE_BOOLEAN, 10, ['nullable' => false, 'default' => false], 'STATUS')
            ->addColumn('created_at', Table::TYPE_TIMESTAMP, null, ['nullable' => false, 'default' => Table::TIMESTAMP_INIT], 'TIME_CREATED')
            ->addColumn('updated_at', Table::TYPE_TIMESTAMP, null, ['nullable' => false, 'default' => Table::TIMESTAMP_INIT_UPDATE], 'TIME_FOR_UPDATE')
            ->setComment('affiliated member table');
        $setup->getConnection()->createTable($table);
        $setup->endSetup();
    }
}
    /*namespace simplifiedMagento\Database\Setup;
    use Magento\Framework\Setup\InstallSchemaInterface;
    use Magento\Framework\Setup\ModuleContextInterface;
    use Magento\Framework\Setup\SchemaSetupInterface;
    use Magento\Framework\DB\Ddl\Table;

    class InstallSchema implements InstallSchemaInterface{
        public function install(SchemaSetupInterface $setup, ModuleContextInterface $context){
            $setup->startSetup();
            $table = $setup->getConnection()->newTable($setup->getTable('masenko'))
                ->addColumn('entity_id',Table::TYPE_INTEGER,null,['identity'=>true,'nullable'=>false,'primary'=>true],'MEMBER ID')
                ->addColumn('name',Table::TYPE_TEXT,255,['nullable'=>false],'NAME OF MEMBER')
                ->addColumn('address',Table::TYPE_TEXT,255,['nullable'=>false],'ADDRESS OF MEMBER')
                ->addColumn('status',Table::TYPE_BOOLEAN,10,['nullable'=>false,'default'=>false],'STATUS')
                ->addColumn('created_at',Table::TYPE_TIMESTAMP,null,['nullable'=>false,'default'=>Table::TIMESTAMP_INIT],'TIME CREATED')
                ->addColumn('updated_at',Table::TYPE_TIMESTAMP,null,['nullable'=>false,'default'=>Table::TIMESTAMP_INIT_UPDATE],'TIME FOR UPDATE')
                ->setComment('affiliated member table');
            $setup->getConnection()->createTable($table);
            $setup->endSetup();
        }
    }*/
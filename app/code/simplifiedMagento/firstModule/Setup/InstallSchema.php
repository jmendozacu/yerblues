<?php

namespace SimplifiedMagento\firstModule\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;

class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $fichero = 'var/log/test.log';
        $actual = file_get_contents($fichero);
        $actual .= "\nEntró en : ".__DIR__."\n";
        file_put_contents($fichero, $actual);
        $installer = $setup;
        $installer->startSetup();
        $tableName = $installer->getTable('masenko');
        $actual = file_get_contents($fichero);
        $actual .= "busca la tabla\n";
        file_put_contents($fichero, $actual);
        if($installer->getConnection()->isTableExists($tableName) != true){
            $actual = file_get_contents($fichero);
            $actual .= "la tabla no existe\n";
            file_put_contents($fichero, $actual);
            try {
                $table = $installer->getConnection()->newTable($tableName)
                    ->addColumn('entity_id', Table::TYPE_INTEGER, null, ['identity' => true, 'nullable' => false, 'primary' => true], 'MEMBER_ID')
                    ->addColumn('name', Table::TYPE_TEXT, 255, ['nullable' => false], 'NAME_OF_MEMBER')
                    ->addColumn('address', Table::TYPE_TEXT, 255, ['nullable' => false], 'ADDRESS_OF_MEMBER')
                    ->addColumn('status', Table::TYPE_BOOLEAN, 10, ['nullable' => false, 'default' => false], 'STATUS')
                    ->addColumn('created_at', Table::TYPE_TIMESTAMP, null, ['nullable' => false, 'default' => Table::TIMESTAMP_INIT], 'TIME_CREATED')
                    ->addColumn('updated_at', Table::TYPE_TIMESTAMP, null, ['nullable' => false, 'default' => Table::TIMESTAMP_INIT_UPDATE], 'TIME_FOR_UPDATE')
                    ->setComment('affiliated member table')
                    ->setOption('charset', 'utf8');
                $actual = file_get_contents($fichero);
                $actual .= "Casi Listo\n";
                file_put_contents($fichero, $actual);
            } catch (\Zend_Db_Exception $e) {
                $actual = file_get_contents($fichero);
                $actual .= "error\n";
                file_put_contents($fichero, $actual);
            }
            $installer->getConnection()->createTable($table);
            $actual = file_get_contents($fichero);
            $actual .= "listeilor\n";
            file_put_contents($fichero, $actual);
        }else{
            $actual = file_get_contents($fichero);
            $actual .= "ya existe\n";
            file_put_contents($fichero, $actual);
        }
        $setup->endSetup();
        $actual = file_get_contents($fichero);
        $actual .= "finalizó\n------------------------------------";
        file_put_contents($fichero, $actual);
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
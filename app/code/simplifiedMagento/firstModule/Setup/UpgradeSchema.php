<?php
    namespace SimplifiedMagento\firstModule\Setup;
    use Magento\Framework\DB\Ddl\Table;
    use Magento\Framework\Setup\ModuleContextInterface;
    use Magento\Framework\Setup\ModuleDataSetupInterface;
    use Magento\Framework\Setup\SchemaSetupInterface;
    use Magento\Framework\Setup\UpgradeDataInterface;
    use Magento\Framework\Setup\UpgradeSchemaInterface;

    class UpgradeSchema implements UpgradeSchemaInterface {
        public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context){
            $setup->startSetup();
            if (version_compare($context->getVersion(),'0.0.2','<')){
                $setup->getConnection()->addColumn(
                    $setup->getTable('masenko'),'phoneNumber',['nullable'=>false,'type'=>Table::TYPE_TEXT,'comment'=>'phone number of member']
                );
            }
            $setup->endSetup();
        }
    }

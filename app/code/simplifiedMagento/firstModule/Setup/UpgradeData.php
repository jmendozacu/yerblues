<?php
    namespace SimplifiedMagento\firstModule\Setup;
    use Magento\Framework\Setup\ModuleContextInterface;
    use Magento\Framework\Setup\ModuleDataSetupInterface;
    use Magento\Framework\Setup\UpgradeDataInterface;

    class UpgradeData implements UpgradeDataInterface{

        public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context){
            $setup->startSetup();
            if (version_compare($context->getVersion(),'0.0.3','<')){
                $setup->getConnection()->insert(
                  $setup->getTable('masenko'),['name'=>'Ade','address'=>'le callesita','status'=>false,'phoneNumber'=>'54877780']
                );
            }
            $setup->endSetup();
        }
    }
<?php
    namespace SimplifiedMagento\firstModule\Setup;
    use Magento\Framework\Setup\InstallDataInterface;
    use Magento\Framework\Setup\ModuleContextInterface;
    use Magento\Framework\Setup\ModuleDataSetupInterface;

    class InstallData implements InstallDataInterface{

        public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context){
            $setup->startSetup();
            $setup->getConnection()->insert(
                $setup->getTable('masenko'),['name'=>'jean','address'=>'calle falsa 123','status'=>true]
            );
            $setup->endSetup();
        }
    }
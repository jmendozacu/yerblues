<?php
    namespace impac\DataBase\Setup;
    use Magento\Framework\Setup\InstallDataInterface as InstallDataInterfaceAlias;
    use Magento\Framework\Setup\ModuleContextInterface;
    use Magento\Framework\Setup\ModuleDataSetupInterface;
    class InstallData implements InstallDataInterfaceAlias{
        public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context){
            $setup->startSetup();
            $setup->getConnection()->insert(
                $setup->getTable('masenko'),['name'=>'lel','address'=>'asd','status'=>true]
            );
            $setup->endSetup();
        }
    }
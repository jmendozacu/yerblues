<?php


namespace simplifiedMagento\CustomAdmin\Vendor\Extension\Model;

class Vendor_Extension_Model_Upload  extends Mage_Core_Model_Config_Data{
    public function _afterSave()
    {
        Mage::getModel('extension/import')->uploadAndImport();
    }
}
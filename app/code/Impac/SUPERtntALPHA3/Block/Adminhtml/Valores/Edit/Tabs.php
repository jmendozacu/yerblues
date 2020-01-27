<?php
namespace Impac\SUPERtntALPHA3\Block\Adminhtml\Items\Edit;
class Tabs extends \Magento\Backend\Block\Widget\Tabs{
    protected function _construct(){
        parent::_construct();
        $this->setId('impac_supertntalpha3_items_edit_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(__('Oficinas'));
    }
}

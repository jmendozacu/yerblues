<?php
namespace Impac\Tntalpha3\Block\Adminhtml\Oficinatnt\Edit;

/**
 * Admin page left menu
 */
class Tabs extends \Magento\Backend\Block\Widget\Tabs
{
    /**
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();
        $this->setId('oficinatnt_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(__('Información Oficina TNT'));
    }
}

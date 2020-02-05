<?php
namespace Impac\SUPERtntALPHA3\Block\Adminhtml;

class Valores extends \Magento\Backend\Block\Widget\Grid\Container
{
    protected function _construct()
    {
        $this->_controller = 'items';
        $this->_headerText = __('Items');
        $this->_addButtonLabel = __('Añadir Nuevo Item');
        parent::_construct();
    }
}
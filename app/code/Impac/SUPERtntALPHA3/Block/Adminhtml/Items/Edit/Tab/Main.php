<?php
namespace Impac\SUPERtntALPHA3\Block\Adminhtml\Items\Edit\Tab;

use Magento\Backend\Block\Widget\Form\Generic;
use Magento\Backend\Block\Widget\Tab\TabInterface;

class Main extends Generic implements TabInterface
{
    protected $_wysiwygConfig;
 
    public function __construct(
        \Magento\Backend\Block\Template\Context $context, 
        \Magento\Framework\Registry $registry, 
        \Magento\Framework\Data\FormFactory $formFactory,  
        \Magento\Cms\Model\Wysiwyg\Config $wysiwygConfig, 
        array $data = []
    ) 
    {
        $this->_wysiwygConfig = $wysiwygConfig;
        parent::__construct($context, $registry, $formFactory, $data);
    }

    /**
     * {@inheritdoc}
     */
    public function getTabLabel()
    {
        return __('Item Information');
    }

    /**
     * {@inheritdoc}
     */
    public function getTabTitle()
    {
        return __('Item Information');
    }

    /**
     * {@inheritdoc}
     */
    public function canShowTab()
    {
        return true;
    }

    public function isHidden()
    {
        return false;
    }
    protected function _prepareForm()
    {
        $model = $this->_coreRegistry->registry('current_impac_supertntalpha3_items');
        $form = $this->_formFactory->create();
        $form->setHtmlIdPrefix('item_');
        $fieldset = $form->addFieldset('base_fieldset', ['legend' => __('Item Information')]);
        if ($model->getId()) {
            $fieldset->addField('supertntalpha3_id', 'hidden', ['name' => 'supertntalpha3_id']);
        }
        $fieldset->addField(
            'nombreOficina',
            'text',
            ['name' => 'nombreOficina', 'label' => __('Nombre'), 'title' => __('Nombre'), 'required' => true]
        );
        $fieldset->addField(
            'Direccion',
            'text',
            ['name' => 'Direccion', 'label' => __('Dirección'), 'title' => __('Dirección'), 'required' => true]
        );
        $fieldset->addField(
            'telefono',
            'text',
            ['name' => 'telefono', 'label' => __('Teléfono'), 'title' => __('Teléfono'), 'required' => true]
        );
        $form->setValues($model->getData());
        $this->setForm($form);
        return parent::_prepareForm();
    }
}

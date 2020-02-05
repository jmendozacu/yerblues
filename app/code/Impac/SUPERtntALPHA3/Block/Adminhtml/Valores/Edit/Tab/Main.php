<?php
namespace Impac\SUPERtntALPHA3\Block\Adminhtml\Valores\Edit\Tab;

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
        $model = $this->_coreRegistry->registry('current_impac_Valores_items');
        $form = $this->_formFactory->create();
        $form->setHtmlIdPrefix('valor_');
        $fieldset = $form->addFieldset('base_fieldset', ['legend' => __('Item Information')]);
        if ($model->getId()) {
            $fieldset->addField('valores_id', 'hidden', ['name' => 'valores_id']);
        }
        $fieldset->addField(
            'pesoMaximo',
            'text',
            ['name' => 'pesoMaximo', 'label' => __('pesoMaximo'), 'title' => __('Peso Máximo'), 'required' => true]
        );
        $fieldset->addField(
            'costoA',
            'text',
            ['name' => 'costoA', 'label' => __('Costo A'), 'title' => __('Costo A'), 'required' => true]
        );
        $fieldset->addField(
            'costoB',
            'text',
            ['name' => 'costoB', 'label' => __('Costo B'), 'title' => __('Costo B'), 'required' => true]
        );
        $form->setValues($model->getData());
        $this->setForm($form);
        return parent::_prepareForm();
    }
}

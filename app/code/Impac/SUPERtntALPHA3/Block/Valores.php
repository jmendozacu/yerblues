<?php

namespace Impac\SUPERtntALPHA3\Block;

class Valores extends \Magento\Framework\View\Element\Template
{
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context
    ) {
        parent::__construct($context);
    }

    public function _prepareLayout()
    {
        $this->pageConfig->getTitle()->set(__('Valores de Envios a Oficinas TNT'));
        
        return parent::_prepareLayout();
    }
}

<?php

namespace Impac\SUPERtntALPHA3\Controller\Adminhtml\Valores;

class Index extends \Impac\SUPERtntALPHA3\Controller\Adminhtml\Valores
{
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Impac_SUPERtntALPHA3::valores');
        $resultPage->getConfig()->getTitle()->prepend(__('Valores de Envio a Oficinas TNT'));
        $resultPage->addBreadcrumb(__('Test'), __('Test'));
        $resultPage->addBreadcrumb(__('Valores'), __('Valores'));
        return $resultPage;
    }
}
<?php

namespace Impac\SUPERtntALPHA3\Controller\Adminhtml\Items;

class Index extends \Impac\SUPERtntALPHA3\Controller\Adminhtml\Items
{
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Impac_SUPERtntALPHA3::test');
        $resultPage->getConfig()->getTitle()->prepend(__('Envios Oficina TNT'));
        $resultPage->addBreadcrumb(__('Test'), __('Test'));
        $resultPage->addBreadcrumb(__('Items'), __('Items'));
        return $resultPage;
    }
}
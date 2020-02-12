<?php

namespace Impac\Tntalpha3\Controller\Adminhtml\valoresoficina;

use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Index extends \Magento\Backend\App\Action
{
    /**
     * @var PageFactory
     */
    protected $resultPagee;

    /**
     * @param Context $context
     * @param PageFactory $resultPageFactory
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    /**
     * Index action
     *
     * @return void
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Impac_Tntalpha3::valoresoficina');
        $resultPage->addBreadcrumb(__('Impac'), __('Impac'));
        $resultPage->addBreadcrumb(__('Manage item'), __('Manage Valoresoficina'));
        $resultPage->getConfig()->getTitle()->prepend(__('Costos de Envío Oficina TNT'));

        return $resultPage;
    }
}
?>

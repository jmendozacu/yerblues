<?php

namespace Impac\Tntalpha3\Controller\Adminhtml\valoresoficina;

use Magento\Framework\App\Filesystem\DirectoryList;

class ExportCsv extends \Magento\Backend\App\Action
{
    protected $_fileFactory;

    public function execute()
    {
        $this->_view->loadLayout(false);

        $fileName = 'costosDeEnvio.csv';

        $exportBlock = $this->_view->getLayout()->createBlock('Impac\Tntalpha3\Block\Adminhtml\Valoresoficina\Grid');

        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();

        $this->_fileFactory = $objectManager->create('Magento\Framework\App\Response\Http\FileFactory');

        return $this->_fileFactory->create(
            $fileName,
            $exportBlock->getCsvFile(),
            DirectoryList::VAR_DIR
        );
    }
}

<?php

namespace Impac\SUPERtntALPHA3\Controller\Index;

use Magento\Framework\App\Action\Context;
use Impac\SUPERtntALPHA3\Model\SUPERtntALPHA3Factory;
use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\MediaStorage\Model\File\UploaderFactory;
use Magento\Framework\Image\AdapterFactory;
use Magento\Framework\Filesystem;

class Save extends \Magento\Framework\App\Action\Action
{
    protected $_supertntalpha3;
    protected $uploaderFactory;
    protected $adapterFactory;
    protected $filesystem;

    public function __construct(
		Context $context,
        SUPERtntALPHA3Factory $supertntalpha3,
        UploaderFactory $uploaderFactory,
        AdapterFactory $adapterFactory,
        Filesystem $filesystem
    ) {
        $this->_supertntalpha3 = $supertntalpha3;
        $this->uploaderFactory = $uploaderFactory;
        $this->adapterFactory = $adapterFactory;
        $this->filesystem = $filesystem;
        parent::__construct($context);
    }
	public function execute()
    {
        $data = $this->getRequest()->getParams();
    	$supertntalpha3 = $this->_supertntalpha3->create();
        $supertntalpha3->setData($data);
        if($supertntalpha3->save()){
            $this->messageManager->addSuccessMessage(__('You saved the data.'));
        }else{
            $this->messageManager->addErrorMessage(__('Data was not saved.'));
        }
        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath('supertntalpha3');
        return $resultRedirect;
    }
}

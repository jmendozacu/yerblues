<?php

namespace Impac\SUPERtntALPHA3\Controller\Index;

use Magento\Framework\App\Action\Context;
use Magento\Framework\Exception\NotFoundException;
use Impac\SUPERtntALPHA3\Block\SUPERtntALPHA3View;

class View extends \Magento\Framework\App\Action\Action
{
	protected $_supertntalpha3view;

	public function __construct(
        Context $context,
        SUPERtntALPHA3View $supertntalpha3view
    ) {
        $this->_supertntalpha3view = $supertntalpha3view;
        parent::__construct($context);
    }

	public function execute()
    {
    	if(!$this->_supertntalpha3view->getSingleData()){
    		throw new NotFoundException(__('Parameter is incorrect.'));
    	}
    	
        $this->_view->loadLayout();
        $this->_view->getLayout()->initMessages();
        $this->_view->renderLayout();
    }
}

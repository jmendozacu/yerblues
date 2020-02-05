<?php

namespace Impac\SUPERtntALPHA3\Block;

use Magento\Framework\View\Element\Template\Context;
use Impac\SUPERtntALPHA3\Model\SUPERtntALPHA3Factory;
use Magento\Cms\Model\Template\FilterProvider;

class SUPERtntALPHA3View extends \Magento\Framework\View\Element\Template
{
    protected $_supertntalpha3;
    public function __construct(
        Context $context,
        SUPERtntALPHA3Factory $supertntalpha3,
        FilterProvider $filterProvider
    ) {
        $this->_supertntalpha3 = $supertntalpha3;
        $this->_filterProvider = $filterProvider;
        parent::__construct($context);
    }

    public function _prepareLayout()
    {
        $this->pageConfig->getTitle()->set(__('Oficinas TNT'));
        
        return parent::_prepareLayout();
    }

    public function getSingleData()
    {
        $id = $this->getRequest()->getParam('id');
        $supertntalpha3 = $this->_supertntalpha3->create();
        $singleData = $supertntalpha3->load($id);
        if($singleData->getSUPERtntALPHA3Id() || $singleData['idOficina'] && $singleData->getStatus() == 1){
            return $singleData;
        }else{
            return false;
        }
    }
}
<?php
namespace Impac\SUPERtntALPHA3\Block;

use Magento\Framework\View\Element\Template\Context;
use Impac\SUPERtntALPHA3\Model\ValoresFactory;

class ValoresListData extends \Magento\Framework\View\Element\Template
{
    protected $_supertntalpha3;
    public function __construct(
        Context $context,
        ValoresFactory $supertntalpha3
    ) {
        $this->_supertntalpha3 = $supertntalpha3;
        parent::__construct($context);
    }

    public function _prepareLayout()
    {
        $this->pageConfig->getTitle()->set(__('Valores Despacho a Oficinas TNT'));
        
        if ($this->getSUPERtntALPHA3Collection()) {
            $pager = $this->getLayout()->createBlock(
                'Magento\Theme\Block\Html\Pager',
                'impac.valores.pager'
            )->setAvailableLimit(array(5=>5,10=>10,15=>15))->setShowPerPage(true)->setCollection(
                $this->getSUPERtntALPHA3Collection()
            );
            $this->setChild('pager', $pager);
            $this->getValoresCollection()->load();
        }
        return parent::_prepareLayout();
    }

    public function getValoresCollection()
    {
        $page = ($this->getRequest()->getParam('p'))? $this->getRequest()->getParam('p') : 1;
        $pageSize = ($this->getRequest()->getParam('limit'))? $this->getRequest()->getParam('limit') : 5;

        $supertntalpha3 = $this->_supertntalpha3->create();
        $collection = $supertntalpha3->getCollection();
        $collection->addFieldToFilter('status','1');
        //$supertntalpha3->setOrder('supertntalpha3_id','ASC');
        $collection->setPageSize($pageSize);
        $collection->setCurPage($page);

        return $collection;
    }

    public function getPagerHtml()
    {
        return $this->getChildHtml('pager');
    }
}
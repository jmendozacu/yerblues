<?php
namespace Impac\SUPERtntALPHA3\Block;

use Magento\Framework\View\Element\Template\Context;
use Impac\SUPERtntALPHA3\Model\SUPERtntALPHA3Factory;

class SUPERtntALPHA3ListData extends \Magento\Framework\View\Element\Template
{
    protected $_supertntalpha3;
    public function __construct(
        Context $context,
        SUPERtntALPHA3Factory $supertntalpha3
    ) {
        $this->_supertntalpha3 = $supertntalpha3;
        parent::__construct($context);
    }

    public function _prepareLayout()
    {
        $this->pageConfig->getTitle()->set(__('Oficinas TNT'));
        
        if ($this->getSUPERtntALPHA3Collection()) {
            $pager = $this->getLayout()->createBlock(
                'Magento\Theme\Block\Html\Pager',
                'impac.supertntalpha3.pager'
            )->setAvailableLimit(array(5=>5,10=>10,15=>15))->setShowPerPage(true)->setCollection(
                $this->getSUPERtntALPHA3Collection()
            );
            $this->setChild('pager', $pager);
            $this->getSUPERtntALPHA3Collection()->load();
        }
        return parent::_prepareLayout();
    }

    public function getSUPERtntALPHA3Collection()
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
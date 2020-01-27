<?php
/**
 * Created by PhpStorm.
 * User: liyassoladogun
 * Date: 1/26/19
 * Time: 2:41 PM
 */

namespace SimplifiedMagento\CustomAdmin\Controller\Adminhtml\Member;


use Magento\Backend\App\Action;
use Magento\Ui\Component\MassAction\Filter;
use SimplifiedMagento\firstModule\Model\ResourceModel\AffiliateMember\CollectionFactory;
use Magento\Backend\Model\View\Result\RedirectFactory;
class MassDelete extends Action
{
    protected $filter;

    protected $collectionFactory;

    protected  $resultRedirectFactory;

    public function __construct(
        Filter $filter,
        CollectionFactory $collectionFactory,
        RedirectFactory $resultRedirectFactory,
        Action\Context $context)
    {

        $this->filter = $filter;
        $this->collectionFactory = $collectionFactory;
        $this->resultRedirectFactory = $resultRedirectFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $collection =  $this->filter->getCollection($this->collectionFactory->create());
        $size = $collection->getSize();

        foreach ($collection as $item) {
            $item->delete();
        }

        $this->messageManager->addSuccessMessage(__('A total of ' .$size. ' have been deleted' ));
       $resultRedirect = $this->resultRedirectFactory->create();

       return $resultRedirect->setPath('*/*/index');
    }
}
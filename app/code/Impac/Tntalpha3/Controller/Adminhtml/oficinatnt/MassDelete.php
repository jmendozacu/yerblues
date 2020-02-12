<?php
namespace Impac\Tntalpha3\Controller\Adminhtml\oficinatnt;

/**
 * Class MassDelete
 */
class MassDelete extends \Magento\Backend\App\Action
{
    /**
     * @return \Magento\Backend\Model\View\Result\Redirect
     */
    public function execute()
    {
        $itemIds = $this->getRequest()->getParam('oficinatnt');
        if (!is_array($itemIds) || empty($itemIds)) {
            $this->messageManager->addError(__('Seleccione Oficinas Por Favor.'));
        } else {
            try {
                foreach ($itemIds as $itemId) {
                    $post = $this->_objectManager->get('Impac\Tntalpha3\Model\Oficinatnt')->load($itemId);
                    $post->delete();
                }
                $this->messageManager->addSuccess(
                    __('A total of %1 record(s) have been deleted.', count($itemIds))
                );
            } catch (\Exception $e) {
                $this->messageManager->addError($e->getMessage());
            }
        }
        return $this->resultRedirectFactory->create()->setPath('tntalpha3/*/index');
    }
}

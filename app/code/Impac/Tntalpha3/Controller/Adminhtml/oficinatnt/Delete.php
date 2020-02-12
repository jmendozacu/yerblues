<?php
namespace Impac\Tntalpha3\Controller\Adminhtml\oficinatnt;

class Delete extends \Magento\Backend\App\Action
{
    /**
     * Delete action
     *
     * @return \Magento\Backend\Model\View\Result\Redirect
     */
    public function execute()
    {
        // check if we know what should be deleted
        $id = $this->getRequest()->getParam('idoficina');
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        if ($id) {
            try {
                // init model and delete
                $model = $this->_objectManager->create('Impac\Tntalpha3\Model\Oficinatnt');
                $model->load($id);
                $model->delete();
                // display success message
                $this->messageManager->addSuccess(__('Oficina Eliminada.'));
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                // display error message
                $this->messageManager->addError($e->getMessage());
                // go back to edit form
                return $resultRedirect->setPath('*/*/edit', ['idoficina' => $id]);
            }
        }
        // display error message
        $this->messageManager->addError(__('No se pudo encontrar la oficina.'));
        // go to grid
        return $resultRedirect->setPath('*/*/');
    }
}

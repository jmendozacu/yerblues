<?php
namespace Impac\SUPERtntALPHA3\Controller\Adminhtml\Valores;

class Delete extends \Impac\SUPERtntALPHA3\Controller\Adminhtml\Valores
{

    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        if ($id) {
            try {
                $model = $this->_objectManager->create('Impac\SUPERtntALPHA3\Model\Valores');
                $model->load($id);
                $model->delete();
                $this->messageManager->addSuccess(__('Eliminaste un Item.'));
                $this->_redirect('impac_supertntalpha3/*/');
                return;
            } catch (\Magento\Framework\Exception\LocalizedException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addError(
                    __('We can\'t delete item right now. Please review the log and try again.')
                );
                $this->_objectManager->get('Psr\Log\LoggerInterface')->critical($e);
                $this->_redirect('impac_supertntalpha3/*/valores', ['id' => $this->getRequest()->getParam('id')]);
                return;
            }
        }
        $this->messageManager->addError(__('No se encontró el ítem a eliminar.'));
        $this->_redirect('impac_supertntalpha3/*/');
    }
}

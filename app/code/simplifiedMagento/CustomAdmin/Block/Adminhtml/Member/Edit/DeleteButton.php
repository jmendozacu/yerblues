<?php
/**
 * Created by PhpStorm.
 * User: liyassoladogun
 * Date: 1/25/19
 * Time: 4:45 AM
 */

namespace SimplifiedMagento\CustomAdmin\Block\Adminhtml\Member\Edit;


use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class DeleteButton extends GenericButton implements ButtonProviderInterface
{

    /**
     * Retrieve button-specified settings
     *
     * @return array
     */
    public function getButtonData()
    {
        $data = [];
        if ($this->getId()) {
            $data = [
                'label' => __('Delete Button'),
                'class' => 'delete',
                'on_click' => 'deleteConfirm(\'' . __('Are you sure you want to Delete this member ?')
                .'\', \'' . $this->getDeleteUrl() .'\')',
                'sort_order' => 20

            ];

        }
        return $data;
    }

    public function getDeleteUrl() {
      return $this->getUrl('*/*/delete' , ['id' => $this->getId()]);
    }
}
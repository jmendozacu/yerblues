<?php
/**
 * Created by PhpStorm.
 * User: liyassoladogun
 * Date: 1/25/19
 * Time: 4:57 AM
 */

namespace SimplifiedMagento\CustomAdmin\Block\Adminhtml\Member\Edit;


use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class SaveButton extends GenericButton implements ButtonProviderInterface
{

    /**
     * Retrieve button-specified settings
     *
     * @return array
     */
    public function getButtonData()
    {
        return  [
            'label' => __("Save Member"),
            'class' => 'save primary',
            'sort_order' => 50
        ];

    }
}
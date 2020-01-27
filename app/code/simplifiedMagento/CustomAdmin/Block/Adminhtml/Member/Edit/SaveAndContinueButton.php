<?php
/**
 * Created by PhpStorm.
 * User: liyassoladogun
 * Date: 1/25/19
 * Time: 4:57 AM
 */

namespace SimplifiedMagento\CustomAdmin\Block\Adminhtml\Member\Edit;


use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class SaveAndContinueButton extends GenericButton implements ButtonProviderInterface
{

    /**
     * Retrieve button-specified settings
     *
     * @return array
     */
    public function getButtonData()
    {
        return  [
            'label' => __("Save And Continue"),
            'class' => 'save',
             'sort_order' => 40
        ];

    }
}
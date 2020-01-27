<?php
/**
 * Created by PhpStorm.
 * User: liyassoladogun
 * Date: 1/25/19
 * Time: 4:40 AM
 */

namespace SimplifiedMagento\CustomAdmin\Block\Adminhtml\Member\Edit;


use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class BackButton extends GenericButton implements ButtonProviderInterface
{

    /**
     * Retrieve button-specified settings
     *
     * @return array
     */
    public function getButtonData()
    {
       return [
           'label' => __('Back'),
           'on_click' => sprintf("location.href = '%s' ;", $this->getBackUrl()),
           'class' => 'back',
            'sort_order' => 10
       ];

    }

    public function getBackUrl() {

        return $this->getUrl('*/*');
    }
}
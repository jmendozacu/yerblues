<?php
/**
 * Created by PhpStorm.
 * User: liyassoladogun
 * Date: 1/25/19
 * Time: 4:31 AM
 */

namespace SimplifiedMagento\CustomAdmin\Block\Adminhtml\Member\Edit;


use SimplifiedMagento\Database\Model\AffiliateMember;

class GenericButton
{

    protected $urlBuilder;

    protected $registry;

    public function __construct(
        \Magento\Backend\Block\Widget\Context $context,
        \Magento\Framework\Registry $registry
    )
    {
        $this->urlBuilder = $context->getUrlBuilder();
        $this->registry = $registry;

    }

    public function getId() {
        /** @var AffiliateMember $member */
        $member = $this->registry->registry('member');

        return $member ? $member->getId() : null;
    }

    public function getUrl($route='', $params = []) {
        return $this->urlBuilder->getUrl($route, $params);
    }

}
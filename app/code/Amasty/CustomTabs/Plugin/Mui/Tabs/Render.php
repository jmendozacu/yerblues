<?php
/**
 * @author Amasty Team
 * @copyright Copyright (c) 2020 Amasty (https://www.amasty.com)
 * @package Amasty_CustomTabs
 */


namespace Amasty\CustomTabs\Plugin\Mui\Tabs;

use Amasty\CustomTabs\Controller\Adminhtml\Tabs\Ui\Render as RenderController;
use Amasty\CustomTabs\Model\Tabs\Loader;

class Render
{
    /**
     * @var Loader
     */
    private $tabsLoader;

    public function __construct(Loader $tabsLoader)
    {
        $this->tabsLoader = $tabsLoader;
    }

    /**
     * @param RenderController $subject
     */
    public function beforeExecute(RenderController $subject)
    {
        $this->tabsLoader->execute();
    }
}

<?php


namespace Impac\SUPERtntALPHA3\Controller\Adminhtml\Items;

class NewAction extends \Impac\SUPERtntALPHA3\Controller\Adminhtml\Items
{

    public function execute()
    {
        $this->_forward('edit');
    }
}

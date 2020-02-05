<?php

namespace Impac\SUPERtntALPHA3\Model\ResourceModel;

class SUPERtntALPHA3 extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init('oficinatnt', 'idOficina');
    }
}
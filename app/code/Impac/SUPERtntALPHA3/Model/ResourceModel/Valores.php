<?php

namespace Impac\SUPERtntALPHA3\Model\ResourceModel;

class Valores extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init('valoresoficina', 'idOficina');
    }
}
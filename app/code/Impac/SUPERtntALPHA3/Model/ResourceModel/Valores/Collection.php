<?php

namespace Impac\SUPERtntALPHA3\Model\ResourceModel\Valores;
 
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'idOficina';
    protected function _construct()
    {
        $this->_init(
            'Impac\SUPERtntALPHA3\Model\Valores',
            'Impac\SUPERtntALPHA3\Model\ResourceModel\Valores'
        );
    }
}
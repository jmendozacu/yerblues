<?php

namespace Impac\SUPERtntALPHA3\Model\ResourceModel\SUPERtntALPHA3;
 
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'idOficina';
    protected function _construct()
    {
        $this->_init(
            'Impac\SUPERtntALPHA3\Model\SUPERtntALPHA3',
            'Impac\SUPERtntALPHA3\Model\ResourceModel\SUPERtntALPHA3'
        );
    }
}
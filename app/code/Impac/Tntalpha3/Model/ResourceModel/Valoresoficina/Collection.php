<?php

namespace Impac\Tntalpha3\Model\ResourceModel\Valoresoficina;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Impac\Tntalpha3\Model\Valoresoficina', 'Impac\Tntalpha3\Model\ResourceModel\Valoresoficina');
        $this->_map['fields']['page_id'] = 'main_table.page_id';
    }

}
?>
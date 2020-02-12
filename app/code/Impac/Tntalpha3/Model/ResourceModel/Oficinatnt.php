<?php
namespace Impac\Tntalpha3\Model\ResourceModel;

class Oficinatnt extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('oficinatnt', 'idoficina');
    }
}
?>
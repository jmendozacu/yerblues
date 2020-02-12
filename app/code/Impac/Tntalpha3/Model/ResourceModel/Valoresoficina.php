<?php
namespace Impac\Tntalpha3\Model\ResourceModel;

class Valoresoficina extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('valoresoficina', 'contador');
    }
}
?>
<?php
    namespace SimplifiedMagento\firstModule\Model\ResourceModel;
    use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
    class AffiliateMember extends AbstractDb{
        protected function _construct(){
            $this->_init('masenko','entity_id');
        }
    }
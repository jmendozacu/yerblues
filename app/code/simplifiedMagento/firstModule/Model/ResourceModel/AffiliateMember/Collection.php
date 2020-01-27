<?php
    namespace SimplifiedMagento\firstModule\Model\ResourceModel\AffiliateMember;
    use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
    use SimplifiedMagento\firstModule\Model\AffiliateMember;
    use SimplifiedMagento\firstModule\Model\ResourceModel\AffiliateMember as bardock;
    class Collection extends  AbstractCollection{
        protected function _construct(){
            parent::_construct();
            $this->_init(AffiliateMember::class,bardock::class);
        }
    }
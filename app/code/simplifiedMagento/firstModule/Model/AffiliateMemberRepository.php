<?php
    namespace SimplifiedMagento\firstModule\Model;
    use SimplifiedMagento\firstModule\api\AffiliateMemberRepositoryInterface;
    use SimplifiedMagento\firstModule\Model\ResourceModel\AffiliateMember\CollectionFactory;
    class AffiliateMemberRepository implements AffiliateMemberRepositoryInterface{
        private $collectionFactory;
        public function __construct(CollectionFactory $collectionFactory){
            $this->collectionFactory = $collectionFactory;
        }

        public function getList(){
            return $this->collectionFactory->create()->getItems();
        }
    }
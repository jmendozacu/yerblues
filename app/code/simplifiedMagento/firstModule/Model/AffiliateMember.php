<?php
    namespace SimplifiedMagento\firstModule\Model;
    use Magento\Framework\Model\AbstractModel;
    use SimplifiedMagento\firstModule\Model\ResourceModel\AffiliateMember as heehee;
    use SimplifiedMagento\firstModule\api\Data\AffiliateMemberInterface;
    ini_set('memory_limit', '-1');
    class AffiliateMember extends AbstractModel implements AffiliateMemberInterface{
        protected function _construct(){
            $this->_init(heehee::class);
        }

        public function getId(){
            return $this->getId(AffiliateMemberInterface::ID);
        }

        public function getName(){
            return $this->getData(AffiliateMemberInterface::NAME);
        }

        public function getStatus(){
            return $this->getData(AffiliateMemberInterface::STATUS);
        }

        public function getAddress(){
            return $this->getAddress(AffiliateMemberInterface::ADDRESS);
        }

        public function getPhoneNumber(){
            return $this->getPhoneNumber(AffiliateMemberInterface::PHONENUMBER);
        }

        public function getCreatedAt(){
            return $this->getCreatedAt(AffiliateMemberInterface::CREATED_AT);
        }

        public function getUpdatedAt(){
            return $this->getUpdatedAt(AffiliateMemberInterface::UPDATED_AT);
        }

        public function setId($id){
            $this->setData(AffiliateMemberInterface::ID,$id);
        }

        public function setName($name){
            $this->setName(AffiliateMemberInterface::NAME,$name);
        }

        public function setStatus($status){
            $this->setStatus(AffiliateMemberInterface::STATUS,$status);
        }

        public function setAddress($address){
            $this->setAddress(AffiliateMemberInterface::ADDRESS,$address);
        }

        public function setPhoneNumber($phoneNumber){
            $this->setPhoneNumber(AffiliateMemberInterface::PHONENUMBER,$phoneNumber);
        }
    }
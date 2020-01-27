<?php
    namespace SimplifiedMagento\firstModule\api\Data;
    interface AffiliateMemberInterface{
        const NAME = "name";
        const ID = "entity_id";
        const ADDRESS = "address";
        const STATUS = "status";
        const CREATED_AT = "created_at";
        const UPDATED_AT = "updated_at";
        CONST PHONENUMBER = "phoneNumber";

        public function getId();
        public function getName();
        public function getStatus();
        public function getAddress();
        public function getPhoneNumber();
        public function getCreatedAt();
        public function getUpdatedAt();
        public function setId($id);
        public function setName($name);
        public function setStatus($status);
        public function setAddress($address);
        public function setPhoneNumber($phoneNumber);

    }
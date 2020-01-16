<?php
    namespace simplifiedMagento\firstModule\Model;
    use phpDocumentor\Reflection\Type;

    class pencilFactory{
        private $objectManager;
        public function __construct(\Magento\Framework\ObjectManagerInterface $objectManager){
            $this->objectManager = $objectManager;
        }
        public function create(array $data){
            return $this->objectManager->create('simplifiedMagento\firstModule\api\pencilInterface',$data);
        }
    }
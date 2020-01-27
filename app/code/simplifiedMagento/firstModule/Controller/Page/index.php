<?php
    namespace SimplifiedMagento\firstModule\Controller\Page;
    use Magento\Framework\App\Action\Action;
    use Magento\Framework\App\Action\Context;
    use Magento\Framework\App\ResponseInterface;
    use SimplifiedMagento\firstModule\Model\AffiliateMemberFactory;
    //use simplifiedMagento\DataBase\Model\ResourceModel\AffiliateMember;

    class index extends Action{
        protected $affiliateMemberFactory;
        public function __construct(Context $context,AffiliateMemberFactory $affiliateMemberFactory){
            $this->affiliateMemberFactory = $affiliateMemberFactory;
            parent::__construct($context);
        }

        public function execute(){
            $affiliateMember = $this->affiliateMemberFactory->create();
            /*$member = $affiliateMember->load('2');
            $member->delete();*/
            /*$member->setAddress('callesotota');
            $member->save();*/
            /*$affiliateMember->addData(['name'=>'dario','address'=>'namek','status'=>true,'phoneNumber'=>'54877780']);
            $affiliateMember->save();*/
            //var_dump($member->getData());
            $collection = $affiliateMember->getCollection()->addFieldToSelect('name')->addFieldToSelect('status');
            foreach ($collection as $item) {
                print_r($item->getData());
                echo "<br>---------------------<br>";
            }
        }
    }
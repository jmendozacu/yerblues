<?php 
    namespace simplifiedMagento\firstModule\Controller\Page;
    use Magento\Framework\App\ResponseInterface;
    use Magento\Framework\App\Action\Context;
    use Magento\Catalog\Api\ProductRepositoryInterface;
    use phpDocumentor\Reflection\Type;
    use simplifiedMagento\firstModule\api\pencilInterface;
    use simplifiedMagento\firstModule\Model\pencilFactory;
    use Magento\Catalog\Model\ProductFactory;


    class Helloworld extends \Magento\Framework\App\Action\Action{

        protected $pencilInterface;
        protected $productRepository;
        protected $pencilFactory;
        protected $productFactory;
        protected $cart;

        public function __construct(Context $context,ProductFactory $productFactory,pencilFactory $pencilFactory,pencilInterface $pencilInterface,ProductRepositoryInterface $productRepository){
            $this->pencilInterface = $pencilInterface;
            $this->productRepository = $productRepository;
            $this->pencilFactory = $pencilFactory;
            $this->productFactory = $productFactory;
            parent::__construct($context);
        }
        public function execute(){
            $product = $this->productFactory->create()->load(1);
            $product->setName("UwU");
            $productName = $product->getName();
            $productSku = $product->getIdBySku("1");
            $productlel = $product->getPrice();

        }
    }
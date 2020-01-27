<?php


namespace SimplifiedMagento\HelloWorld\Block;


use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Framework\View\Element\Template;

class HelloWorld extends \Magento\Framework\View\Element\Template{
    protected $product;
    public function __construct(ProductRepositoryInterface $productRepository,Template\Context $context, array $data = []){
        $this->product = $productRepository;
        parent::__construct($context, $data);
    }

    public function getProductName(){
        $product = $this->product->get('2');
        return $product->getName();
    }
}
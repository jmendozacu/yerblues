<?php
    namespace SimplifiedMagento\HelloWorld\ViewModel;
    use Magento\Framework\View\Element\Block\ArgumentInterface;
    class HelloView implements ArgumentInterface{
        public function getHelloWorld(){
            return "(‡▼益▼)";
        }
        public function helloArray(){
            $array = ["good","bien","dePana"];
            return $array;
        }
    }
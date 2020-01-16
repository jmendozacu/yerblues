<?php
    namespace simplifiedMagento\firstModule\plugin;
    class pluginSolution{
        /*public function beforeSetName(\Magento\Catalog\Model\Product $product,$name){
            return "Before Plugin ".$name;
        }*/
        public function afterGetName(\Magento\Catalog\Model\Product $product,$result){
            return $result." (๑˃ᴗ˂)ﻭ";
        }
        public function afterGetPrice(\Magento\Catalog\Model\Product $product,$result){
            return $result;
        }
        public function aroundGetIdBySku(\Magento\Catalog\Model\Product $product, callable $proceed,$sku){
            //echo "after proceed<br>";
            $id = $proceed($sku);
            echo $id."(°△°)/";
            //echo "before proceed<br>";
            return $id;
        }
        public function aroundGetName(\Magento\Catalog\Model\Product $product, callable $proceed){
            //echo "after proceed<br>";
            $name = $proceed();
            //echo $name."<br>";
            //echo "before proceed<br>";
            return $name;
        }
    }
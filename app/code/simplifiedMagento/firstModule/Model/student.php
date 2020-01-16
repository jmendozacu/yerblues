<?php
    namespace simplifiedMagento\firstModule\Model;
    class student{
        private $name;
        private $age;
        private $notas;
        public function __construct($name = "Brayatan",$age=15,array $notas = array('uwu'=>7,'ewe'=>6)){
            $this->name = $name;
            $this->age = $age;
            $this->notas = $notas;
        }
    }
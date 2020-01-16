<?php
    namespace simplifiedMagento\firstModule\Model;
    use simplifiedMagento\firstModule\api\Color;
    use simplifiedMagento\firstModule\api\brillo;
    class amarillo implements Color{
        protected $brillo;
        public function __construct(brillo $brillo){
            $this->brillo = $brillo;
        }

        public function getColor(){
            return "amarillo";
        }
    }
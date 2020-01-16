<?php
    namespace simplifiedMagento\firstModule\Model;
    use simplifiedMagento\firstModule\api\pencilInterface;
    use simplifiedMagento\firstModule\api\Color;
    use simplifiedMagento\firstModule\api\Size;
    class Pencil implements pencilInterface{
        protected $color;
        protected $size;
        protected $name;
        protected $school;
        public function __construct(Color $color,Size $size,$name = null,$school = null){
            $this->color = $color;
            $this->size = $size;
            $this->name = $name;
            $this->school = $school;
        }

        public function getPencilType(){
            return "El lápiz es color ".$this->color->getColor()." y es de tamaño ".$this->size->getSize();
        }
    }
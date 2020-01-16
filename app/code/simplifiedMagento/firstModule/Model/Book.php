<?php
    namespace simplifiedMagento\firstModule\Model;
    use simplifiedMagento\firstModule\api\Color;
    use simplifiedMagento\firstModule\api\Size;
    class Book{
        protected $color;
        protected $size;
        public function __construct(Color $color,Size $size){
            $this->color = $color;
            $this->size = $size;
        }
    }
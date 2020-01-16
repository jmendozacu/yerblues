<?php
    namespace simplifiedMagento\firstModule\NotMagento;

    class yellowPencil implements pencilInterface{
        public function getPencilType(){
            return "Yellow Pencil";
        }
    }
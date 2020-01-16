<?php
    namespace simplifiedMagento\firstModule\NotMagento;

    class redPencil implements pencilInterface{
        public function getPencilType(){
            return "Red Pencil";
        }
    }
<?php


namespace simplifiedMagento\firstModule\Model;
use simplifiedMagento\firstModule\api\Size;

class grande implements Size{

    public function getSize(){
        return "grande";
    }
}
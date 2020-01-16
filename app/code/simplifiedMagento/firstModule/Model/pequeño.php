<?php


namespace simplifiedMagento\firstModule\Model;
use simplifiedMagento\firstModule\api\Size;

class pequeño implements Size
{
    public function getSize(){
        return "pequeño";
    }
}
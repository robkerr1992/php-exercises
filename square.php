<?php

require_once 'rectangle.php';

class Square extends Rectangle
{


    public function __construct($dimensions) {
        parent::__construct($dimensions, $dimensions);
        $this->height = $dimensions;
        $this->width = $dimensions;


    }

    public function perimeter() {
       return $this->height*4 . PHP_EOL;
    }

    public function area()
    {
        return $this->height*4 . PHP_EOL;
//        return parent::area();
    }

}
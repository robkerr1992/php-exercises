<?php

class Rectangle
{
    public $height;
    public $width;

    public function __construct($height, $width) {
        $this->height = $height;
        $this->width = $width;


    }
    public function area() {
        return ($this->height * $this->width) . PHP_EOL;
    }
    public function perimeter() {
        return ($this->height * 2) + ($this->width * 2) . PHP_EOL;
    }

}
<?php

class ProgramWindow {    
    public $x;
    public $y;
    public $height;
    public $width;
    function __construct() {
        $this->x = 0;
        $this->y = 0;
        $this->height = 600;
        $this->width = 800;
    }
    //x
    function x(){
        return $this->x;
    }

    //y
    function y() {
        return $this->y;
    }

    //height
    function height() {
        return $this->height;
    }

    //width
    function width() {
        return $this->width;
    }

    //resize
    function resize(Size $size) {
        $this->height = $size->getHeight();
        $this->width = $size->getWidth();
    }

    //move
    function move(Position $position) {
        $this->x = $position->getX();
        $this->y = $position->getY();
    }
}

class Size {
    public $height;
    public $width;

    function __construct($height, $width) {
        $this->height = $height;
        $this->width = $width;
    }

    function getHeight() {
        return $this->height;
    }

    function getWidth() {
        return $this->width;
    }
}

class Position {
    public $x;
    public $y;

    function __construct($y, $x) {
        $this->y = $y;
        $this->x = $x;
    }

    function getX(){
        return $this->x;
    }

    function getY() {
        return $this->y;
    }
}

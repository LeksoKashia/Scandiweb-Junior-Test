<?php

class Furniture extends Product{
    private $height;
    private $width;
    private $length;
    static $measurment = "Dimensions";
    static $unit = "";

    function __construct($sku,$name,$price, $type, $height,$width,$length) {
      parent::__construct($sku,$name,$price, $type);
      $this->height = $height;
      $this->width = $width;
      $this->length = $length;
      $this->value = "{$height}x{$width}x{$length}";

    }
}
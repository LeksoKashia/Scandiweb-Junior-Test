<?php

class DVD extends Product{
    private $size;
    static $measurment = "Size";
    static $unit = "CM";

    function __construct($sku,$name,$price, $type, $size) {
      parent::__construct($sku,$name,$price, $type);
      $this->size = $size;
      $this->value = "$size";
    }
}
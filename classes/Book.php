<?php

class Book extends Product{
    private $weight;
    static $measurment = "Weight";
    static $unit = "KG";

    function __construct($sku,$name,$price, $type, $weight) {
      parent::__construct($sku,$name,$price, $type);
      $this->weight = $weight;
      $this->value = "$weight";
    }
}
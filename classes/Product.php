<?php

abstract class Product
{
    public $sku;
    public $name;
    public $price;
    public $type;
    public $value;

    function __construct($sku,$name,$price, $type) {
      $this->sku = $sku;
      $this->name = $name;
      $this->price = $price;
      $this->type = $type;
    }

}
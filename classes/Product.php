<?php

abstract class Product
{
    protected $sku;
    protected $name;
    protected $price;
    protected $type;
    protected $value;

    function __construct($sku,$name,$price, $type) {
      $this->sku = $sku;
      $this->name = $name;
      $this->price = $price;
      $this->type = $type;
    }

    public function deliver(){
      $db = new DatabaseConnection();
      return $db->insertProduct($this->sku, $this->name, $this->price, $this->type, $this->value);
    }

}
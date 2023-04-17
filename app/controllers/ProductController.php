<?php

class ProductController extends DatabaseConnection{



  public function detectType(){
      if(isset($_POST['submit'])){
        $fields = [
          "DVD" => ["size"],
          "Book" => ["weight"],
          "Furniture" => ["height", "width", "length"]
        ];
        $type = $_POST['type'];
        $args = [$sku = $_POST['sku'], $name = $_POST['name'], $price = $_POST['price'], $type = $_POST['type']];
        foreach ($fields[$type] as $field) {
          $args[] = $_POST[$field];
        }

        $product = new $type(...$args);
        return $product->deliver();
      }
} 

    public function displayData(){
      $data = $this->data();
      foreach ($data as $card) {
          $type = $card['type'];
          $measurment = $type::$measurment;
          $unit = $type::$unit;
          echo   "<div class='card'>
          <input type='checkbox' value='{$card['sku']}' name='leks[]' class='delete-checkbox' />
          <p> $card[sku] </p>
          <p> $card[name] </p>
          <p> $card[price] $</p>
          <p>$measurment: $card[value] $unit</p>
          </div>";
      }

    }

    public function delete_check(){
      if (isset($_POST['delete'])) {
        if (isset($_POST['leks'])) {
            $checkeds = $_POST['leks'];
            $this->delete($checkeds);
        }

  
      }


    
    }



}

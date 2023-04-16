<?php

class DatabaseConnection{
  private $host = "localhost";
  private $user = "root";
  private $password = "";
  private $dbName = "testing";

  protected function connect(){
    $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbName;
    $pdo = new PDO($dsn, $this->user, $this->password);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $pdo;
  }

  public function data(){
    $sql = "SELECT * FROM products";
    $stmt = $this->connect()->query($sql);
    $results = $stmt->fetchAll();
    return $results;
  }


  public function insert($values) {
    $check = "SELECT * FROM products WHERE SKU = '$values->sku'";
    $checkResult = $this->connect()->query($check);
    $checkRows = $checkResult->fetchColumn();
    if ($checkRows > 0) {
      echo "<h4 class='danger'>A product with the specified SKU already exists</h4>";

    }else{
      $query = "INSERT INTO products (SKU, Name, Price, Type, Value) VALUES (?, ?, ?, ?, ?)";

      $res = $this->connect()->prepare($query);
      $res->execute([$values->sku, $values->name, $values->price, $values->type, $values->value]);
    
      if ($res) {
          header('Location:index.php');
      }
    }
  }

  public function delete($checkeds){

    $pdo = $this->connect();
    $sql = "DELETE FROM products WHERE sku = ?";
    $stmt = $pdo->prepare($sql);

    foreach ($checkeds as $sku) {
        $stmt->execute([$sku]);
    }

  

}
}

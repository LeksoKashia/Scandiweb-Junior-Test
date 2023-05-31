<?php


class DatabaseConnection implements DBInterface{


  private $host = "localhost";
  private $user = "root";
  private $password = "";
  private $dbName = "scandiweb";
  private $conn;

  public function __construct() {
    $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbName;
    $this->conn = new PDO($dsn, $this->user, $this->password);
    $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
  }

  public function data(){
    $sql = "SELECT * FROM products";
    $stmt = $this->conn->query($sql);
    $results = $stmt->fetchAll();
    return $results;
  }

  
  public function insertProduct($sku,$name,$price, $type, $value) {
    $checkQuery = "SELECT COUNT(*) FROM products WHERE SKU = ?";
    $checkStmt = $this->conn->prepare($checkQuery);
    $checkStmt->execute([substr($sku, 0, 15)]);
    $existingProductsCount = $checkStmt->fetchColumn();
    if ($existingProductsCount > 0) {
      echo $sku;
      echo "<h4 class='danger'>A product with the specified SKU already exists</h4>";
    } else {
      $insertQuery = "INSERT INTO products (sku, name, price, type, value) VALUES (?, ?, ?, ?, ?)";
      $insertStmt = $this->conn->prepare($insertQuery);
      $insertStmt->execute([$sku, $name, $price, $type, $value]);
      if ($insertStmt) {
        header('Location: index.php');
      }
    }
  }

  public function delete($checkeds){
    $sql = "DELETE FROM products WHERE sku = ?";
    $stmt = $this->conn->prepare($sql);
    foreach ($checkeds as $sku) {
        $stmt->execute([$sku]);
    }
  }
}

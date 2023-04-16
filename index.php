<?php
include 'autoloader.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="style.css" />
    <title>Document</title>
  </head>
  <body>
  <form action="index.php" method="POST">

  <header>
    <h1>Product List</h1>
    <div class="buttons">
      <a href="productadd.php">
        <button class="green"  type="button" name="myButton">Add</button>
      </a>
      <button class="red"  type="submit" name="delete" value="mass_delete">Mass Delete</button>

    </div>
  </header>
  <hr />


  
  <?php

        $data = new ProductController();
        $data->delete_check();
        $data->displayData();
   ?> 

</form>
    <footer>
      <hr />
      <h3>Scandiweb Test assignment</h3>
    </footer>
  </body>
</html>

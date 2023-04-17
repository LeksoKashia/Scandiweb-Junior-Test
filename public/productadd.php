<?php
include 'autoloader.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <title>Document</title>
  </head>
  <body>
    <header>
      <h1>Product Add</h1>
      <div class="buttons">
        <a href="/Scandiweb/public/">
          <button class="red">Cancel</button>
        </a>
      </div>
    </header>

    <hr />
    <form class="main-form" method="POST">
      <div class="input-div">
        <span class="first">SKU</span>
        <input type="text" class="sku" name="sku" id="sku" placeholder="sku" />
      </div>
      <?php

        $productType = new ProductController;
        $productType->detectType();

        ?>

      <div class="input-div">
        <span class="second">Name</span>
        <input type="text" class="name" name="name" id="name" placeholder="name" />
      </div>

      <div class="input-div">
        <span class="third">Price ($)</span>
        <input type="number" class="price" name="price" id="price" placeholder="price" />
      </div>

      <div >
      <span class="fourth">Type Switcher</span>
      <select id="productType"class="selector" name="type">
        <option value="">Type switcher</option>
        <option value="DVD">DVD</option>
        <option value="Furniture">Furniture</option>
        <option value="Book">Book</option>
      </select>
    </div>
    <br>


      <div id="input-fields">
  
          <div id="dvd-fields" style="display:none;">
          <div class="input-div">
            <span class="third">Size (MB)</span>
            <input type="text" class="size" name="size" id="size" placeholder="size">
          </div>
            <p class="description" >Please, provide disc space in MB</p>
          </div>

          <div id="furniture-fields" style="display:none;">
          
          <div class="input-div">


              <div class="furniture-labels">

                <span class="third">Height (CM)</span>
                <span class="third">Width (CM)</span>
                <span class="third">Length (CM)</span>
              </div>
              <div class="dimensions">
                <input type="text" class="height" name="height" id="height" placeholder="height">
                <input type="text" class="width" name="width" id="width" placeholder="width">
                <input type="text" class="length" name="length" id="length" placeholder="length">
              </div>
          </div>

          <p class="description">
            Please, provide dimensions in HxWxL format
          </p>
          </div>

          <div id="book-fields"style="display:none;">
          <div class="input-div">

            <span class="third">Weight (KG)</span>
            <input type="text" class="weight" name="weight" id="weight" placeholder="weight">
          </div>
          <p class="description">Please, provide Book weight in KG</p>
        </div>

     
      </div>

      
      <div class='form-div'>
        <button type="submit" name="submit" class="green">Save</button>
      </div>

      <div id="my-modal" class="modal">
  <div class="modal-content">
    <p id="modal-text"></p>
  </div>
</div>

    </form>
    <footer>
      <hr />
      <h3>Scandiweb Test assignment</h3>
    </footer>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="js/add.js"></script>
<script>
</script>
  </body>
</html>
<?php

spl_autoload_register('myAutoLoader');

function myAutoLoader($className){
  $path = "../app/model/";
  $extension = ".php";
  $fullPath = $path . $className . $extension;
  
  if (file_exists($fullPath)){
    include_once $fullPath;
  }else if($className == 'ProductController'){
    include "../app/controllers/". $className . $extension;
  }else{
    include "../app/config/". $className . $extension;
  }

}
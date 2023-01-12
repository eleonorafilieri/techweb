<?php
include("../dataManagement/db.php");
//include("../dataManagement/common.php");

if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = array();
}

if(!in_array($_GET['id'], $_SESSION['cart'])){
    array_push($_SESSION['cart'], $_GET['id']);
  //  $_SESSION['message'] = 'Product added to cart';
}
else{
    
    //$_SESSION['cart'][$_GET['id']] += 1;
   // $_SESSION['message'] = 'Product already in cart';
}

?>


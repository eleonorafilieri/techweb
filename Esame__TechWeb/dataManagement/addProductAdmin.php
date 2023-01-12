<?php
include("../dataManagement/db.php");
//include("../dataManagement/common.php");

if(isset($_POST['name'], $_POST['price'],$_POST['type'])){
    $name = $_POST['name'];
    $price = $_POST['price'];
    $type = $_POST['type'];    
    addProductAdmin($name, $price, $type);
}
?>

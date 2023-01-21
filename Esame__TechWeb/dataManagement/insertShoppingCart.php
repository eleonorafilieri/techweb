<?php
//permette la creazione di una variabile di sessione cart
include("../dataManagement/db.php");

if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = array();
}

if(!in_array($_GET['id'], $_SESSION['cart'])){
    array_push($_SESSION['cart'], $_GET['id']);
}

?>


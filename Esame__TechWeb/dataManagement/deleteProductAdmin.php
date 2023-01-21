<?php
//questo file viene richiamato in "homepage.js" al click sul pulsante di
//eliminazione di un prodotto dal db da parte di un admin. Prorpio quella funzione infatti passa a questo
//file l'id del prodotto da eliminare. Questo file a sua volta passa il parametro alla funzione
//deleteProductAdmin presente nel file db.php
include("../dataManagement/db.php");

if(isset($_GET['id'])){
    $id = $_GET['id'];
    deleteProductAdmin($id);
}
?>

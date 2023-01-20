<?php
include("../dataManagement/db.php");
//include("../dataManagement/common.php");
//controllare che siano stati inseriti valori per i campi richiesti per l'aggiunta dei prodotti
//e assegnare i valori, che verranno poi passati alal funzione addProductAdmin nel file db.php
if(isset($_POST['name'], $_POST['price'],$_POST['type'])){
    $name = $_POST['name'];
    $price = $_POST['price'];
    $type = $_POST['type'];    
    addProductAdmin($name, $price, $type);
}
?>

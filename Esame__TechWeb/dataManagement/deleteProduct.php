<?php
	include("../dataManagement/common.php");

	//RIMUOVE IL PRODOTTO SELEZIONATO DALLA SESSIONE['CART']
	$key = array_search($_GET['id'], $_SESSION['cart']);	
	unset($_SESSION['cart'][$key]);

    //MESSAGGIO DI AVVENUTA ELIMINAZIONE
    if (isset($_GET['msg'])) {
        $_SESSION['message'] = $_GET['msg'];
    }
?>
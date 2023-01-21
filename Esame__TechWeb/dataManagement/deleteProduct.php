
<?php
//questo file viene richiamato in "carrello.js" al click sul pulsante di
//eliminazione di un prodotto dal carrello. Prorpio quella funzione infatti passa a questo
//file l'id del prodotto da eliminare e il messaggio da comunicare all'utente di conferma di
//eliminazione del prodotto.
	include("../dataManagement/common.php");

	//RIMUOVE IL PRODOTTO SELEZIONATO DALLA SESSIONE['CART']
	$key = array_search($_GET['id'], $_SESSION['cart']);	
	unset($_SESSION['cart'][$key]);

    //MESSAGGIO DI AVVENUTA ELIMINAZIONE
    if (isset($_GET['msg'])) {
        $_SESSION['message'] = $_GET['msg'];
    }
?>
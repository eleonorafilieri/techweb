<?php
//questo file viene richiamato nel file carrello.js nella funzione clearCart, la quale si attiva al
//click sul button "Svuota carrello". la funzione unset presente qui infatti non fa altro che
//distruggere la variabile cart che era stata creata in questa sessione.
include("../dataManagement/common.php");
    //PULISCE IL CARRELLO DELLA SPESA
    unset($_SESSION['cart']);
    

    //MESSAGGIO DI AVVENUTA CONFERMA
    if (isset($_GET['msg'])) {
        $_SESSION['message'] = $_GET['msg'];
    }
?>
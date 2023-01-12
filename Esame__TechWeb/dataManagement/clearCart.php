<?php
    include("../dataManagement/common.php");
    //PULISCE IL CARRELLO DELLA SPESA
    unset($_SESSION['cart']);

    //MESSAGGIO DI AVVENUTA CONFERMA
    if (isset($_GET['msg'])) {
        $_SESSION['message'] = $_GET['msg'];
    }
?>
<?php
if (!isset($_SESSION)) {
    session_start();
}

//funzione di rendirizzamento con messaggio incluso
function redirect($url, $message){
    if ($message != "") {
        $_SESSION["message"] = $message;
    }
    header("Location: $url");
    die;
}

//funzione per controllare se l'utente ha effettivamente fatto il login oppure
//ha inserito nella barra di ricerca direttamente l'homepage
function isLogged(){
    if (!isset($_SESSION["username"])) {
        redirect("../pagine/index.php", "Per favore registrati se vuoi usare questo sito web!");
    }
}

?>
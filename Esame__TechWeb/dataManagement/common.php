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

//funzione per controllare se è loggato
function isLogged(){
    if (!isset($_SESSION["username"])) {
        redirect("../pagine/index.php", "Please, login if you want to use this website!");
    }
}

?>
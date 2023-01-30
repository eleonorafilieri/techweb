<?php
//Gestione login, controllo dei dati inseriti, se errati reindirizzamento alla homepage,
//altrimenti inizio sessione
include("db.php");
if (isset($_REQUEST["username"]) && isset($_REQUEST["password"])) {
  $username = $_REQUEST["username"];
  $password = $_REQUEST["password"];
  //md5 è una funzione di php che permette di creare una password criptata,
  //che sarà quella che andremo a utilizzare per verificare il login nel db
  $cryptoPassword = md5($password);
  if (checkPassword($username, $cryptoPassword)) {
    if (isset($_SESSION)) {
      session_destroy();
      session_start();
    }
    //recupero del valore del campo "administrator" sul db tramite il valore dell'username
    //che viene passato alla funzione checkAdministrator presente in db.php. Questa funzione
    //infatti ci ridarà indietro il valore trovato nel db e da quello sarà posssibile definire una sessione per Admin o per utente
    $admin = checkAdministrator($username);
    foreach ($admin as $ad) {
      $amministratore = $ad["administrator"];
    }
    if ($amministratore) {
      $_SESSION["navbar"] = "navbarAdmin.html";
    } else {
      $_SESSION["navbar"] = "navbar.php";
    }

    $_SESSION["username"] = $username;
    header("location: ../pagine/homepage.php");
  } else {
    redirect("../pagine/index.php", "Username o password errati.");
  }
}
?>
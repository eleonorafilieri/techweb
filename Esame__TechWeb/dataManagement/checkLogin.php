<?php
//Gestione login, controllo dei dati inseriti, se errati reindirizzamento alla homepage, altrimenti inizio sessione
//include("common.php");
include("db.php");
if (isset($_REQUEST["username"]) && isset($_REQUEST["password"])) {
  $username = $_REQUEST["username"];
  $password = $_REQUEST["password"];
  $cryptoPassword = md5($password);
  if (checkPassword($username, $cryptoPassword)) {
    if (isset($_SESSION)) {
      session_destroy();
      session_start();
      session_regenerate_id(TRUE);
    }
    $admin = checkAdministrator($username);
    foreach ($admin as $ad) {
      $amministratore = $ad["administrator"];
    }

    //TODO: UTILIZZARE TABELLA FUNCTIONALITY PER LA NAVBAR, SE È ADMIN AUTOMATICAMENTE SETTA LA NAVABAR.
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
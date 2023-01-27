<?php
//Il file corrente controlla che i dati inseriti siano validi e reindirizza la pagina.
include("db.php");

if (isset($_REQUEST["username"]) && isset($_REQUEST["email"]) && isset($_REQUEST["password"])) {
   
    $username = $_REQUEST["username"];
    $email = $_REQUEST["email"];
    $password = $_REQUEST["password"];
    $confirm_password = $_REQUEST["confirm-password"];
}

if ($password != $confirm_password) {
    echo("Le password non coincidono");
}

$cryptoPassword = md5($password);

if (checkEmail($email)) {
    redirect("../pagine/signup.php", "Email esistente!");
} else if (checkUsername($username)) {
    redirect("../pagine/signup.php", "Il nome utente non è disponibile!");
} else {
    createUser($username, $email, $cryptoPassword);
    $_SESSION["name"] = $username;
    redirect("../pagine/index.php", "Usa i dati della registrazione per effettuare l'accesso.");
}
//redirect è una funzione definita nel file common.php( incluso nel file db.php)che 
//gestisce due parametri: l'url della pagine a cui fare il redirect e il valore di un messaggio
//da inserire o nella medesima pagina signup.php per segnalare eventuali errori o nell'h5 presente
//nella pagina di index.php
?>

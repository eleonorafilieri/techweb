<?php
//questo file viene richiamato in homepage.js al click sul dropdown menu che permette la
//visualizzazione dei prodotti esistenti per una categoria. Proprio da quella funzione viene
//passata qui la categoria di prodotti, e a sua volta questo file passerà i dati alla funzione
//getMobili presente nel file db.php, che recupererà effettivamente tutte le informazioni sui
//singoli prodotti per categoria dal db. Ottenuta questa informazione questo invierà il contenuto json
//elaborato dalla richiesta al db al file homepage.js che lo stamperà.
include "db.php";
header("Content-type: application/json");
//questa funzione header invia l'intestazione http json al browser
//per informarlo sul tipo di dati che gli sta inviando. 
print "{\n";

$rows = getmobili();

$count = $rows->rowCount();
if ($count == 0) {
    $errMsg = "Attualmente non ci sono mobili disponibili!";
    print "  \"errMsg\": \"".$errMsg."\"";
} else {
    // encode to json all the rows in our result set
    print "  \"mobili\": ";
    print json_encode($rows->fetchAll(PDO::FETCH_ASSOC));
    print "\n}\n";
}
?>


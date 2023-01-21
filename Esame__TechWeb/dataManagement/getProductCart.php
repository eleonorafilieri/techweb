<?php
//questo file viene richiamato in carrello.js nella funzione reloadCart(che agisce sin dal
//caricamento della pagina) al click sulla voce di menu del carrello che permette la visualizzazione
//dei prodotti presenti nel carrello. I prodotti aggiunti nel carrello vengono salvati in una variabile
//"cart" creata nel file homepage.js., dove vengono memorizzati gli id dei prodotti aggiunti al carrello.
//Proprio da qui a riga 14 viene richiamata la funzione getProductCart presente nel file db.php, 
//che in base agli id memorizzati nella variabile "cart" ricerca i prodotti nel db, risalendo
//ai prezzi dei singoli prodotti.
//Queste informazioni ottenute al db, verranno quindi rimandate in json alla funzione reloadCart che,
//richiamando la funzione "printCart" o "printEmptyCart" stamperanno il carrello. 
include "db.php";
header("Content-type: application/json");

print "{\n";

$rows = getProductCart();

$count = $rows->rowCount();
if ($count == 0) {
    $errMsg = "Attualmente non ci sono mobili disponibili!";
    print "  \"errMsg\": \"".$errMsg."\"";
} else {
    // encode to json all the rows in our result set
    print "  \"carrello\": ";
    print json_encode($rows->fetchAll(PDO::FETCH_ASSOC));
    print "\n}\n";
}


?>
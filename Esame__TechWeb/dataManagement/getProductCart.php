<?php
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
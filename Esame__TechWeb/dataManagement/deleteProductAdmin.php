<?php
include("../dataManagement/db.php");
//include("../dataManagement/common.php");

if(isset($_GET['id'])){
    $id = $_GET['id'];
    deleteProductAdmin($id);
}
?>

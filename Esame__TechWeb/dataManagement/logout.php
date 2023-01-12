<?php
    include("common.php");
    if (isset($_SESSION)) {
        session_unset();
        session_destroy();
    }
    header("location: ../pagine/index.php");
?>
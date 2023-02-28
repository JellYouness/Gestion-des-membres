<?php 
    include "init.php";
    include $template . "db_connect.php"; 

    session_start();

    session_unset();

    session_destroy();

    header("Location: http://localhost/Dashboard/layout/");
?>
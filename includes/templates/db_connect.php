<?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $dbname = "pcc";

    try{
    $db = new PDO('mysql:host=localhost;dbname=pcc;','root','') ;
    }
    catch(Exception $e){
        echo $e->getMessage();
        die;
    }
?>
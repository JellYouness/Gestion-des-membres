<?php 
    include "init.php";
    include $template . "db_connect.php";

    if (isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "delete from membres where id_membre = '$id'";
        $result = $db->query($sql);
        // if (!$result) echo $db->error;
        header("Location: http://localhost/Dashboard/layout/Liste.php");
    }
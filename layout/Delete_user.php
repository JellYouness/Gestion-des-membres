<?php 
    include "init.php";
    include $template . "db_connect.php";

    if (isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "delete from users where id_user = '$id'";
        $result = $db->query($sql);
        // if (!$result) echo $db->error;
        header("Location: http://localhost/Dashboard/layout/users.php");
    }
    ?>
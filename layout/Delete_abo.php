<?php 
    include "init.php";
    include $template . "db_connect.php";

    if (isset($_GET['idb'])){
        $idb = $_GET['idb'];
        $id = $_GET['id_mbr'];
        $sql = "delete from abonnement where id_abonnement = '$idb'";
        $result = $db->query($sql);
        // if (!$result) echo $db->error;
        header("Location: http://localhost/Dashboard/layout/view_abo.php?id=".$id);
    }else var_dump($_GET);

    ?>
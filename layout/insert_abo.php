<?php 
    include "init.php";
    include $template . "db_connect.php";

    if (isset($_GET['id'])){
        $id = $_GET['id'];}

    if(isset($_POST['submit'])){
                if(!empty($_POST['activite']) &&
                    !empty($_POST['datedebut']) &&
                    !empty($_POST['datefin']) &&
                    !empty($_POST['prix'])){
                        $activite=$_POST['activite']; 
                        $datedebut=$_POST['datedebut'];  
                        $datefin=$_POST['datefin']; 
                        $prix=$_POST['prix'];
                        $sql = "insert into abonnement values('','$id','$activite','$datedebut','$datefin','$prix')";
                        $result = $db->query($sql);
                        if (!$result) echo $db->error;
                        else header("Location: http://localhost/Dashboard/layout/abonnement.php");
                    }
                }
    if(isset($_POST['delete'])){
        $sql = "delete from membres where id_membre = $id";
        $result = $db->query($sql);
        if (!$result) echo $db->error;
        else header("Location: http://localhost/Dashboard/layout/Liste.php");
        }
?>
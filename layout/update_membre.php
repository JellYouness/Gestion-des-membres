<?php 
    include "init.php";
    include $template . "db_connect.php";

    if (isset($_GET['id'])){
        $id = $_GET['id'];}

    if(isset($_POST['submit'])){
                if(!empty($_POST['Nom']) &&
                    !empty($_POST['Prenom']) &&
                    !empty($_POST['Cin']) &&
                    !empty($_POST['Sexe']) &&
                    !empty($_POST['naissance']) && 
                    !empty($_POST['Tele']) &&
                    !empty($_POST['Email']) &&
                    !empty($_POST['Adresse']) &&
                    !empty($_POST['Ville'])  &&
                    !empty($_POST['Pays'])  &&
                    !empty($_POST['Code_Postal'])){
                        $nom=$_POST['Nom']; 
                        $prenom=$_POST['Prenom'];  
                        $cin=$_POST['Cin']; 
                        $civ=$_POST['Sexe']; 
                        $nais=$_POST['naissance']; 
                        $tele=$_POST['Tele']; 
                        $email=$_POST['Email']; 
                        $adr=$_POST['Adresse']; 
                        $ville=$_POST['Ville'];  
                        $pays=$_POST['Pays'];  
                        $postal=$_POST['Code_Postal'];
                        $sql = "update membres set cin_membre='$cin', nom_membre='$nom', prenom_membre='$prenom', sexe_membre='$civ', date_naissance='$nais',
                         email_membre='$email', tele_membre='$tele', adresse='$adr', code_postal='$postal', pays='$pays', ville='$ville' where id_membre='$id'";
                        $result = $db->query($sql);
                        if (!$result) echo "error";
                        else header("Location: http://localhost/Dashboard/layout/Liste.php");
                    }
                }
    if(isset($_POST['delete'])){
        $sql = "delete from membres where id_membre = $id";
        $result = $db->query($sql);
        if (!$result) echo $db->error;
        else header("Location: http://localhost/Dashboard/layout/Liste.php");
        }
?>
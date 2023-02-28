<?php
    $title= "Gestion des abonnements > Abonnements d'un membre.";
    include "init.php";
    include $template . "header.php";
    include $template . "db_connect.php"; 

    if (isset($_GET['id'])){
        $id = $_GET['id'];
        $action = 'insert_abo.php?id='.$id;
        $query = "select cin_membre, nom_membre, prenom_membre, sexe_membre, date_naissance, email_membre, tele_membre, adresse, code_postal, pays, ville, date_creation
                    from membres
                    where id_membre = '$id'";
            $result = $db->query($query);
            $row = $result->fetch(PDO::FETCH_ASSOC);
    }

?>
    <div class="viewabo-container">
        <div class="membre-info">
            <span>
                <p class="txt">ID: </p><?php echo $id; ?>
            </span>
            <span>
                <p class="txt">Nom: </p><?php echo $row['nom_membre']; ?>
            </span>
            <span>
                <p class="txt">Prenom: </p><?php echo $row['prenom_membre']; ?>
            </span>
        </div>
        <div class="abos">
        <?php  
                    $sql="select * from membres natural join abonnement natural join activite where id_membre=".$id;
                    $result = $db->query($sql);
                    if (!$result) echo $db->error;
                    if($result->rowCount() >0){
                        while($row=$result->fetch(PDO::FETCH_ASSOC)){
                            $idab = $row['id_abonnement'];
                            echo "  <div class='abo'>
                                        <div>
                                            <span>ID Abonnement: </span>".$idab."
                                        </div>
                                        <div>
                                            <span>Activité: </span>".$row['id_activite']."
                                        </div>
                                        <div>
                                            <span>Date de debut: </span>".$row['date_debut'] ."
                                        </div>
                                        <div>
                                            <span>Date de fin: </span>".$row['date_fin'] ."
                                        </div>
                                        <div class='link'>
                                        <a  href=Delete_abo.php?idb=".$idab."&id_mbr=".$id."><img src='images/trash.png' style='width:2.5rem;'> </a>
                                        </div>
                                    </div>" ;}}?>
        </div>
    </div>





        
<?php include $template . "footer.php"; ?>
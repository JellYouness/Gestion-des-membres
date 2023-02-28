<?php
    $title= "Gestion des abonnements > Ajout d'un abonnement.";
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

        <div class="add-form">
          <form class="registration" method="post" action="<?php echo $action; ?>">
          <div  class="inputs">
              <label for="datedebut">Date de debut:</label>
              <input type="date" id="datedebut" name="datedebut" />
            </div>
            <div  class="inputs">
              <label for="datefin">Date de fin:</label>
              <input type="date" id="datefin" name="datefin" />
            </div>
        
            <div  class="inputs">
              <label for="prix">Prix:</label>
              <input
                type="text"
                id="prix"
                name="prix"
                placeholder="Prix"
                maxlength="10"
              />
            </div>

            <div  class="inputs">
              <label for="activite">Activité:</label>
              <select id="activite" name="activite">
              <?php $result = $db->query("select * from activite");
                    if (!$result) echo $db->error;
                    if($result->rowCount() >0){
                        while($row=$result->fetch(PDO::FETCH_ASSOC)){
                            echo '<option value="'.$row ['id_activite'].'">'.$row['nom_activite'].'</option>';
                        }
                    }
                ?>
              </select>
            </div>

            
            <div class="btns">
              <input type="submit" name="submit" value="Ajouter"  id="btn">
            </div>
          </form>
        </div> 
<?php include $template . "footer.php"; ?>
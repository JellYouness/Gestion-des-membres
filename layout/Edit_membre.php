<?php
    $title= "Gestion des membres > Modification d'un membre.";
    include "init.php";
    include $template . "header.php";
    include $template . "db_connect.php"; 

    if (isset($_GET['id'])){
        $id = $_GET['id'];
        $action = 'update_membre.php?id='.$id;
        $query = "select cin_membre, nom_membre, prenom_membre, sexe_membre, date_naissance, email_membre, tele_membre, adresse, code_postal, pays, ville, date_creation
                    from membres
                    where id_membre = '$id'";
            $result = $db->query($query);
            $row = $result->fetch(PDO::FETCH_ASSOC);
    }

?>

        <div class="add-form">
          <form class="registration" method="post" action="<?php echo $action; ?>">
            <div class="inputs">
              <label for="Nom">Nom:</label>
              <input
                type="text"
                id="Nom"
                name="Nom"
                placeholder="Nom"
                maxlength="50"
                value="<?php echo $row['nom_membre'] ?>"
              />
            </div>

            <div class="inputs">
              <label for="Prenom">Prenom:</label>
              <input
                type="text"
                id="Prenom"
                name="Prenom"
                placeholder="Prenom"
                maxlength="50"
                value="<?php echo $row['prenom_membre'] ?>"
              />
            </div>

            <div class="inputs">
              <label for="Cin">CIN:</label>
              <input
                type="text"
                id="Cin"
                name="Cin"
                placeholder="CIN"
                maxlength="10"
                value="<?php echo $row['cin_membre'] ?>"
              />
            </div>

            <div class="inputs">
              <label for="Sexe">Civilité:</label>
              <select id="Sexe" name="Sexe" value="<?php echo $row['Sexe'] ?>">
                <option value="M">M.</option>
                <option value="Mme">Mme</option>
                <option value="Mlle">Mlle</option>
              </select>
            </div>

            <div class="inputs">
              <label for="naissance">Date de naissance:</label>
              <input type="date" id="naissance" name="naissance" value="<?php echo $row['date_naissance'] ?>"/>
            </div>
            <div class="inputs">
              <label for="Tele">Telephone:</label>
              <input
                type="tel"
                id="Tele"
                name="Tele"
                placeholder="Telephone"
                maxlength="10"
                value="<?php echo $row['tele_membre'] ?>"
              />
            </div>

            <div class="long-form-line">
              <label for="Email">Email:</label>
              <input
                type="email"
                id="Email"
                name="Email"
                placeholder="Email"
                maxlength="100"
                value="<?php echo $row['email_membre'] ?>"
              />
            </div>
            <div  class="inputs" class="long-form-line">
              <label for="Adresse">Adresse:</label>
              <input
                type="text"
                id="Adresse"
                name="Adresse"
                placeholder="Adresse"
                maxlength="100"
                value="<?php echo $row['adresse']?>"
              />
            </div>

            <div class="inputs">
              <label for="Ville">Ville:</label>
              <input
                type="text"
                id="Ville"
                name="Ville"
                placeholder="Ville"
                maxlength="30"
                value="<?php echo $row['ville'] ?>"
              />
            </div>

            <div class="inputs">
              <label for="Pays">Pays:</label>
              <input
                type="text"
                id="Pays"
                name="Pays"
                placeholder="Pays"
                maxlength="30"
                value="<?php echo $row['pays'] ?>"
              />
            </div>
            <div class="inputs">
              <label for="Code_Postal">Code Postal:</label>
              <input
                type="text"
                id="Code_Postal"
                name="Code_Postal"
                placeholder="Code Postal"
                maxlength="10"
                value="<?php echo $row['code_postal'] ?>"
              />
            </div>
            <div  class="btns">
              <input type="submit" name="delete" value="Supprimer"  id="btn">
              <input type="submit" name="submit" value="Modifier"  id="btn">
            </div>
          </form>
        </div> 
<?php include $template . "footer.php"; ?>
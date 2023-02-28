<?php
$title = "Ajout d'un membre";
    include "init.php";
    include $template . "header.php";
    include $template . "db_connect.php"; 
    $inserted=0;
    if(isset($_POST['submit'])){
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
      $creation= date('Y-m-d h:i:s');
      
      $sql= "INSERT INTO membres values ('','$cin','$nom','$prenom','$civ','$nais','$email','$tele','$adr','$postal','$pays','$ville','$creation')";
      $result = $db->query($sql);
        if($result){ $inserted=1;}
        else{$inserted=2;}

  }
?>
<style>
      
    </style>
  <?php if($inserted == 1){echo '<div class="success msg"> Membre Ajouté </div>';}
        if($inserted == 2){echo '<div class="alert msg"> ERREUR!!! Membre n\'est pas Ajouté. </div>';}
      $inserted = 0;
      ?>
        <div class="add-form">
          <form class="registration" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="inputs">
              <label for="Nom">Nom:</label>
              <input
                type="text"
                id="Nom"
                name="Nom"
                placeholder="Nom"
                maxlength="50" required
              />
            </div>

            <div class="inputs">
              <label for="Prenom">Prenom:</label>
              <input
                type="text"
                id="Prenom" 
                name="Prenom"
                placeholder="Prenom"
                maxlength="50" required
              />
            </div>

            <div class="inputs">
              <label for="Cin">CIN:</label>
              <input
                type="text"
                id="Cin"
                name="Cin"
                placeholder="CIN"
                maxlength="10" required
              />
            </div>

            <div class="inputs">
              <label for="Sexe">Civilité:</label>
              <select id="Sexe" name="Sexe">
                <option value="M">M.</option>
                <option value="Mme">Mme</option>
                <option value="Mlle">Mlle</option>
              </select>
            </div>

            <div class="inputs">
              <label for="naissance">Date de naissance:</label>
              <input type="date" id="naissance" name="naissance" required/>
            </div>
            <div class="inputs">
              <label for="Tele">Telephone:</label>
              <input
                type="tel"
                id="Tele"
                name="Tele"
                placeholder="Telephone"
                maxlength="10" required
              />
            </div>

            <div  class="inputs" class="long-form-line">
              <label for="Email">Email:</label>
              <input
                type="email"
                id="Email"
                name="Email"
                placeholder="Email"
                maxlength="100" required
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
              />
            </div class="inputs">

            <div class="inputs">
              <label for="Ville">Ville:</label>
              <input
                type="text"
                id="Ville"
                name="Ville"
                placeholder="Ville"
                maxlength="30"
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
              />
            </div>
            <div class="btn-ajt"><input type="submit" name="submit" value="Ajouter"  id="btn" required/>
          </form>
        </div> 
<?php include $template . "footer.php"; ?>
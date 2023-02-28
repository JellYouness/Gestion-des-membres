<?php
$title = "Gestion des utilisateurs > Ajout d'un utilisateur";
    include "init.php";
    include $template . "header.php";
    include $template . "db_connect.php"; 
    $inserted=0;
    if(isset($_POST['submit'])){
      $nom=$_POST['Nom']; 
      $prenom=$_POST['Prenom'];  
      $username=$_POST['Username']; 
      $password=md5($_POST['Password']); 
      $email=$_POST['Email']; 

      
      $sql= "insert into users values('','$username','$password','$nom','$prenom','$email','0')";
      $result = $db->query($sql);
        if($result){ $inserted=1;}
        else{$inserted=2;}

  }
?>
<style>
      
    </style>
  <?php if($inserted == 1){echo '<div class="success msg"> Utilisateur Ajouté </div>';}
        if($inserted == 2){echo '<div class="alert msg"> ERREUR!!! Utilisateur n\'est pas Ajouté. </div>';}
      $inserted = 0;
      ?>
        <div class="add-form">
          <form class="registration" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="inputs">
              <label for="Username">Username:</label>
              <input
                type="text"
                id="Username"
                name="Username"
                placeholder="Username"
                maxlength="10" required
              />
            </div>
            <div class="inputs">
              <label for="Password">Password:</label>
              <input
                type="password"
                id="Password"
                name="Password"
                placeholder="Password"
                maxlength="10" required
              />
            </div>
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

            <div class="inputs" >
              <label for="Prenom">Prenom:</label>
              <input
                type="text"
                id="Prenom" 
                name="Prenom"
                placeholder="Prenom"
                maxlength="50" required
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

            <div class="btn-ajt"><input type="submit" name="submit" value="Ajouter"  id="btn" required>
          </form>
        </div> 
<?php include $template . "footer.php"; ?>
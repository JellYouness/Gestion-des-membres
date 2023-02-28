<?php 
    $title= "Profile > Settings > Changer le mot de passe";
    include "init.php";
    include $template . "header.php";
    include $template . "db_connect.php";
    $changed=0;
    if(isset($_POST['submit'])){
        $oldpass=$_POST['oldpass']; 
        $newpass=$_POST['newpass'];  
        $confirmnewpass=$_POST['confirmnewpass'];  
    
    $sql="select password from users where id_user=".$_SESSION['id_user'];
    $result=$db->query($sql);
    $value=$result->fetch(PDO::FETCH_ASSOC);
    if($value['password']==md5($oldpass)){
        if($newpass==$confirmnewpass){
            $sql="update users set password='".md5($newpass)."' where id_user=".$_SESSION['id_user'];
            $result=$db->query($sql);
            $changed=1;
        }else{$changed=3;}
    }else{$changed=2;}

}
?>

<style>
      .alert{
      background-color: rgba(248, 215, 218, 1); 
      color:rgba(114, 28, 36,1); 
      font-size: 1.2rem; 
      width:25rem; 
      padding: 2rem 1rem;
      border: 1px solid rgba(114, 28, 36,1);
      border-radius: 5px;
      }

      .success{
      background-color: rgba(227, 253, 235, 1);
      border: 1px solid rgba(60, 118, 61, 1);
      color: rgba(60, 118, 61, 1);
      }

      .msg{
      font-size: 1.2rem; 
      width:46rem; 
      padding: 2rem 1rem;
      border-radius: 5px;
      }
    </style>
  <?php if($changed == 1){echo '<div class="success msg"> Mot de passe changé avec success </div>';}
        else if($changed == 2){echo '<div class="alert msg">Ancient mot de passe incorrect!</div>';}
        else if($changed == 3){echo '<div class="alert msg">echec de confirmation de nouveau mot de passe!</div>';}
      $changed = 0;
      ?>
<form class="changepassword" method="post" action=<?php echo $_SERVER['PHP_SELF'] ?>>

    <div>
    <label for="oldpass">Ancient mot de passe:</label>
    <input type="password" id="oldpass" name="oldpass" placeholder="Ancient mot de passe" class="input">
    </div>

    <div>
    <label for="newpass">Nouveau mot de passe:</label>
    <input type="password" id="newpass" name="newpass" placeholder="Nouveau mot de passe" class="input">
    </div>

    <div>
    <label for="confirmnewpass">Confirmer nouveau mot de passe:</label>
    <input type="password" id="confirmnewpass" name="confirmnewpass" placeholder="Confirmer nouveau mot de passe" class="input">
    </div>

    <input type="submit" name="submit" value="Changer"  class="btn-pass btn">


</form>
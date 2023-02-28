<?php 
include "init.php";
include $template . "db_connect.php"; 
    $error=0;
    session_start();
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        if(empty($username) || empty($password)){
            $error=1;
        }else{
                $password = md5($password);
                $sql = "Select * from users where username='$username' and password='$password'";
                $result = $db->query($sql);
                $rows = $result->rowCount();
                if($rows == 1){
                    $value = $result->fetch(PDO::FETCH_ASSOC);
                    $_SESSION = $value;
                    header("Location: http://localhost/Dashboard/layout/dashboard.php");
                }}
    }
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href= <?php echo $css ."login.css"?> />
    <title>Login</title>
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
    </style>
  </head>
  <body>
    <div class="container">
      <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="loginform">
        <img src="images/logo-pcc.png" class="pcc_img">
        <?php if($error == 1){
        echo '<div class="alert"> Username ou Mot de passe est incorrect</div> ';
      }
      ?>
        <div>
            <label for="username">Username:</label>
        <input
          type="text"
          id="username"
          name="username"
          placeholder=""
          autocomplete="off"
          class="input"
          autofocus
        />
        </div>
        <div>        
            <label for="password">Mot de passe:</label>
            <input
              type="password"
              id="password"
              name="password"
              placeholder=""
              class="input"
            />
        <span class="border"></span></div>

        <input type="submit" name="submit" value="Se Connecter" class="submit btn-pass">
      </form>
    </div>
  </body>
</html>

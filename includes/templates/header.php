<?php 
    include "init.php";
    include $template . "db_connect.php"; 
    session_start();
    if(!isset($_SESSION['id_user'])){
      header("Location: http://localhost/Dashboard/layout/");
    }
  ?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="<?php echo $css;?>ajouter.css"/>
    <link rel="stylesheet" href="<?php echo $css;?>interface.css" />
    <link rel="stylesheet" href="<?php echo $css;?>Liste.css" />
    <link rel="stylesheet" href="<?php echo $css;?>edit.css" />
    <link rel="stylesheet" href="<?php echo $css;?>abonnement.css" />
    <link rel="stylesheet" href="<?php echo $css;?>view_abo.css" />
    <link rel="stylesheet" href="<?php echo $css;?>dashboard.css" />
    <link rel="stylesheet" href="<?php echo $css;?>settings.css" />
    <link rel="stylesheet" href="<?php echo $css;?>changepassword.css" />
    <link rel="icon" href="images/logo-mini.png">
    <title><?php echo $title; ?></title>
  </head>
  <body>
    <!--------------TOPBAR-------------->
    <header class="topbar-header">
      <div class="logo-menu">
        <a href="#"> <img class="nav-logo" src="images/logo-mini.png" /> </a>
        <img class="menu" src="images/menu.png" onclick="myFunction();"/>
      </div>
      <div class="bell-user">
      <img class="bell" src="images/bell.png" />
      <div class="user-infos">
        <img class="user-img" src="images/img.jpg" />
        <span class="user-name"><?php echo $_SESSION['nom_user']." ".$_SESSION['prenom_user'];?> </span>
        <ul class="login-menu">
          <li>
            <a href="logout.php">Déconnexion</a>
          </li>
          <li>
            <a href="settings.php">Paramètres</a>
          </li>
        </ul>
      </div>
      </div>
    </header>
      <!--------------NavBar-------------->
    <nav id="nav">
        <ul class="nav-bar">
          <li class="nav-ele">
            <a href="Dashboard.php"
              ><img class="nav-ele-icon " src="images/dash.png" />
              <span class="nav-ele-p">Dashboard</span>
            </a>
          </li>
          <li class="nav-ele">
            <a href="Ajouter.php"
              ><img class="nav-ele-icon " src="images/add.png" />
              <span class="nav-ele-p">Ajouter</span>
            </a>
          </li>
          <li class="nav-ele">
            <a href="Liste.php"
            ><img class="nav-ele-icon" src="images/user-list.png" />
            <span class="nav-ele-p">Listes</span>
          </a>
        </li>
        <li class="nav-ele">
          <a href="abonnement.php"
            ><img class="nav-ele-icon" src="images/bookmarks.png" />
            <span class="nav-ele-p">Abonnements</span>
          </a>
        </li>
          <?php 
              if($_SESSION['isAdmin'] == 1){
                echo '<li class="nav-ele">
                <a href="users.php"
                  ><img class="nav-ele-icon" src="images/git.png" />
                  <span class="nav-ele-p">Utilisateus</span>
                </a>
              </li>';
              }
          ?>
          <li class="nav-ele">
            <a href="settings.php"
              ><img class="nav-ele-icon" src="images/setting.png" />
              <span class="nav-ele-p">Settings</span>
            </a>
          </li>
        </ul>
    </nav>
      <!--------------Container-------------->
    <section id="inside-container">
    <p class="location">Dashbord > <?php echo $title ?></p>

    <?php include $template . "footer.php"; ?> 
    
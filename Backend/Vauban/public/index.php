<?php
session_start();

$host = 'metacharsetfuckit.com';
$dbname   = 'blih4119_Vauban';
$username = 'blih4119_0';
$password = 'L0calhost&';

$db = new mysqli($host, $username, $password, $dbname); 


if(isset($_POST['Login'])){
  $pseudo = htmlspecialchars($_POST['pseudo']);
  $passwd = htmlspecialchars($_POST['passwd']);

  $recupMessages = $db->query('SELECT * FROM compte');

  while($compte = $recupMessages->fetch_assoc()){

      if($compte["pseudo"] == $pseudo && $compte["password"] == $passwd){
          $_SESSION['inputID'] = $compte["uniqueID"];
          $_SESSION['pseudo'] = $compte["pseudo"];
          header("Location: agenda.php");
      }
      else{
          //echo $compte["pseudo"]==$pseudo;
          //echo $pseudo;
          //echo $compte["password"];
          //echo $passwd;
      }
  }
  echo "<script>alert('Username or password incorrect!');</script>";
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="css/login.css">
    
    </head>

    
    <div class="wrapper">
      <form class="login" method="POST">
        <p class="title">Se Connecter</p>
        <input type="text" placeholder="Mail" name="pseudo"/>
        <i class="fa fa-user"></i>
        <input type="password" placeholder="Mot de passe" name="passwd"/>
        <i class="fa fa-key"></i>
        <!-- <a href="#">Forgot your password?</a> -->
        <br>
        <div class="spinner">
            <input class="state" type="submit" name="Login">
        </div>
      </form>
      
      </p>
    </div>
 <!-- <script type="text/javascript" src="jquery-3.3.1.slim.min.js"></script>
 <script type="text/javascript" src="popper.min.js"></script>
 <script type="text/javascript" src="bootstrap.min.js"></script> -->
 </html>
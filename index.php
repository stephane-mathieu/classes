<?php

// include ('user.php');
include ('user-pdo.php');
session_start();


var_dump($_SESSION);
// $connexion_user = new User();
$connexion_user = new userpdo();
print( $_SESSION['login']);

if(isset($_POST['submit'])){
    $connexion_user->delete($_SESSION['login']);

}

if(isset($_POST['deco'])){
       $connexion_user->disconnect();
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<a href="inscription.php">inscription</a>
<a href="connexion.php">connexion</a>
<a href="update.php">update</a>
<form class="row g-3" action="" method="POST">
<div">
    <button class="btn btn-primary" name="submit" type="submit">supp</button>
</div>
<div">
    <button class="btn btn-primary" name="deco" type="submit">deconnecte</button>
</div>
</form>
</body>
</html>

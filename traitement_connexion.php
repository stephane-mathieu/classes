<?php
 session_start();
include ('user.php');
include ('user-pdo.php');

$login = $_POST['login'];
$password = $_POST['password'];


$connexion_user = new User();
$connexion_user = new userpdo();




if(isset($_POST['submit'])){
    // $connexion_user->connect($login,$password);
    $connexion_user->connect($login,$password);
    
  
}

?>
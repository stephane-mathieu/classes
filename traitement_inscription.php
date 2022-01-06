<?php

include ('user.php');
include ('user-pdo.php');

$create_user = new User();
// $create_user = new userpdo();

$login = $_POST['login'];
$password =$_POST['password'];
$email = $_POST['email'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];



// $create_user->register("$login","$password","$email","$firstname","$lastname");
$create_user->register($login,$password,$email,$firstname,$lastname);
header("Location: connexion.php");
?>
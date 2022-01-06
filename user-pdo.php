<?php

class userpdo {

    private $id;
    public $login;
    public $email;
    public $firstname;
    public $lastname;
    public $connexion;


    public function __construct()
    {
        try{
            $pdo = new PDO('mysql:host=localhost;dbname=classes',"root","");
            $this->connexion = $pdo;
        }
        catch(PDOException $e){
            echo "Erreur :" . $e->getMessage(). "<br>";
            die();
        }

    }

    public function register($login,$password,$email,$firstname,$lastname){
        
            $password = $this->connexion->prepare("INSERT INTO `utilisateurs`(`login`, `password`, `email`, `firstname`, `lastname`) VALUES ('$login','$password','$email','$firstname','$lastname')");
            $password->setFetchMode(PDO::FETCH_ASSOC);
            $password->execute();
            $addUser= $password->fetchall();

        // $req = mysqli_query($this->connexion,"SELECT * FROM `utilisateurs` Where login = '$login'");
        // $result = mysqli_fetch_all($req);
            $recup= $this->connexion->prepare("SELECT * FROM `utilisateurs` Where login = '$login'");
            $recup->setFetchMode(PDO::FETCH_ASSOC);
            $recup->execute();
            $addUser1= $password->fetchall();

        return($addUser1);
        
    }

    public function connect($login,$password){

        $re = $this->connexion->prepare("SELECT * FROM utilisateurs where login = '$login'");
        $re->setFetchMode(PDO::FETCH_ASSOC);
        $re->execute();
        $result= $re->fetchall();


        if ($password == $result[0]['password'] && $login == $result[0]['login']) {
            session_start();
            $_SESSION['login'] = $result[0]['login'];
            $this->password = $result[0]['pasword'];
            
            $this->login = $result[0]['login'];
            
            echo "connected";
            header("Location: index.php");

   
        }
    }

    public function disconnect(){
        session_destroy();
    }

    public function delete($login){
        $re = $this->connexion->prepare("DELETE FROM `utilisateurs` WHERE login = '$login'");
        $re->execute();
        session_destroy();
        header("Location: index.php");
    }

    public function update($login,$password,$email,$firstname,$lastname){
        $this->login = $_SESSION['login'];
        $re = $this->connexion->prepare("SELECT * FROM utilisateurs where login = '$this->login'");
        $re->setFetchMode(PDO::FETCH_ASSOC);
        $re->execute();
        $result= $re->fetchall();
        $this->id = $result[0]['id'];
       
        // $re1 = "UPDATE `utilisateurs` SET `login`='$login',`password`='$password',`email`='$email',`firstname`='$firstname',`lastname`='$lastname' WHERE id = '$this->id'";
        // $que = mysqli_query($this->connexion, $re1);

        $re = $this->connexion->prepare("UPDATE `utilisateurs` SET `login`='$login',`password`='$password',`email`='$email',`firstname`='$firstname',`lastname`='$lastname' WHERE id = '$this->id'");
        $re->execute();
    }


    public function isConnected(){
        if($_SESSION['login']){
            return true;
        }else {
            return false;
        }
    }

    public function getAllInfos(){
        $this->login = $_SESSION['login'];
        $re = $this->connexion->prepare("SELECT * FROM utilisateurs where login = '$this->login'");
        $re->setFetchMode(PDO::FETCH_ASSOC);
        $re->execute();
        $result= $re->fetchall();
        return $result;
    }
    public function getLogin(){
        $re = $this->connexion->prepare("SELECT login FROM utilisateurs where login = '$this->login'");
        $re->setFetchMode(PDO::FETCH_ASSOC);
        $re->execute();
        $result= $re->fetchall();
        return $result;
    }
    public function getEmail(){
        $re = $this->connexion->prepare("SELECT email FROM utilisateurs where login = '$this->login'");
        $re->setFetchMode(PDO::FETCH_ASSOC);
        $re->execute();
        $result= $re->fetchall();
        return $result;
    }
    public function getFirstname(){
        $re = $this->connexion->prepare("SELECT firstname FROM utilisateurs where login = '$this->login'");
        $re->setFetchMode(PDO::FETCH_ASSOC);
        $re->execute();
        $result= $re->fetchall();
        return $result;
    }
    public function getLastname(){
        $re = $this->connexion->prepare("SELECT lastname FROM utilisateurs where login = '$this->login'");
        $re->setFetchMode(PDO::FETCH_ASSOC);
        $re->execute();
        $result= $re->fetchall();
        return $result;
    }

}


?>
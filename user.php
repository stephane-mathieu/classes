<?php
class User {
    
    private $id;
    public $login;
    public $password;
    public $email;
    public $firstname;
    public $lastname;
    public $connexion;
 
    
    public function __construct()
    {
        $conn = mysqli_connect("localhost", "root", "", "classes");
        $this->connexion = $conn;

    }

    public function register($login,$password,$email,$firstname,$lastname){
        
        $res = mysqli_query($this->connexion, "INSERT INTO `utilisateurs`(`login`, `password`, `email`, `firstname`, `lastname`) VALUES ('$login','$password','$email','$firstname','$lastname')");


        $req = mysqli_query($this->connexion,"SELECT * FROM `utilisateurs` Where login = '$login'");
        $result = mysqli_fetch_all($req);

        return($result);
        
    }

    public function connect($login,$password){
        
        $re = "SELECT * FROM utilisateurs where login = '$login'";
        $que = mysqli_query($this->connexion, $re);
        $result_psw = mysqli_fetch_assoc($que);


        if ($password == $result_psw['password'] && $login == $result_psw['login']) {
            session_start();
            $_SESSION['login'] = $result_psw['login'];
            $this->password = $result_psw['pasword'];
            
            $this->login = $result_psw['login'];
            
            echo "connected";
            header("Location: index.php");

   
        }
    }


    public function disconnect(){

        session_destroy();
    }

    public function delete($login){
        $que = mysqli_query($this->connexion,"DELETE FROM `utilisateurs` WHERE login = '$login'");
        session_destroy();
        header("Location: index.php");
    }

    public function update($login,$password,$email,$firstname,$lastname){

        $this->login = $_SESSION['login'];
        $re = "SELECT * FROM utilisateurs where login = '$this->login'";
        $que = mysqli_query($this->connexion, $re);
        $result_psw = mysqli_fetch_assoc($que);
        $this->id = $result_psw['id'];
       
        $re1 = "UPDATE `utilisateurs` SET `login`='$login',`password`='$password',`email`='$email',`firstname`='$firstname',`lastname`='$lastname' WHERE id = '$this->id'";
        $que = mysqli_query($this->connexion, $re1);
    }

    public function isConnected(){
        if(isset($_SESSION['login'])){
            return true;
        }else {
            return false;
        }
    }

    public function getAllInfos(){
        $this->login = $_SESSION['login'];
        $re = "SELECT * FROM utilisateurs where login = '$this->login'";
        $que = mysqli_query($this->connexion, $re);
        $result_psw = mysqli_fetch_assoc($que);
        return $result_psw;
    }
    public function getLogin(){
        $re = "SELECT login FROM utilisateurs where login = '$this->login'";
        $que = mysqli_query($this->connexion, $re);
        $result_psw = mysqli_fetch_assoc($que);
        return $result_psw;
    }
    public function getEmail(){
        $re = "SELECT email FROM utilisateurs where login = '$this->login'";
        $que = mysqli_query($this->connexion, $re);
        $result_psw = mysqli_fetch_assoc($que);
        return $result_psw;
    }
    public function getFirstname(){
        $re = "SELECT firstname FROM utilisateurs where login = '$this->login'";
        $que = mysqli_query($this->connexion, $re);
        $result_psw = mysqli_fetch_assoc($que);
        return $result_psw;
    }
    public function getLastname(){
        $re = "SELECT lastname FROM utilisateurs where login = '$this->login'";
        $que = mysqli_query($this->connexion, $re);
        $result_psw = mysqli_fetch_assoc($que);
        return $result_psw;
    }
}
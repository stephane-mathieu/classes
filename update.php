<?php
session_start();

include('user.php');
// include('user-pdo.php');



$logine = $_SESSION['login'];
$login = $_POST['login'];
$password = $_POST['password'];
$email = $_POST['email'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];

$User = new USer();
// $User = new userpdo();
$User->login = $_SESSION['login'];

if(isset($_POST['submit'])) {
    $User->update($login, $password, $email, $firstname, $lastname);
}
var_dump($User->isConnected());
// print_r ($User->getAllInfos());
// print_r ($User->getLogin());
// print_r ($User->getEmail());
// print_r ($User->getFirstname());
// print_r ($User->getLastname());

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
    <a href="index.php">index</a>
    <h1>modifier votre profil</h1>
    <div>
        <div>
            <form class="row g-3" action="" method="POST">
                <div>
                    <label for="validationDefaultUsername" class="form-label">Login</label>
                    <input type="text" class="form-control" name="login" id="validationDefault03"  required>
                </div>
                <div>
                    <label for="validationDefaultUsername" class="form-label">email</label>
                    <input type="text" class="form-control" name="email" id="validationDefault03"  required>
                </div>
                <div>
                    <label for="validationDefaultUsername" class="form-label">firstname</label>
                    <input type="text" class="form-control" name="firstname" id="validationDefault03"  required>
                </div>
                <div>
                    <label for="validationDefaultUsername" class="form-label">lastname</label>
                    <input type="text" class="form-control" name="lastname" id="validationDefault03"  required>
                </div>
                <div>
                    <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                </div>
                <div">
                    <button class="btn btn-primary" name="submit" type="submit">Valider</button>
        </div>
        </form>
    </div>
    </div>
    </main>

</body>

</html>
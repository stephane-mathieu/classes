
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <title>Document</title>
</head>

<body>
<h1 >Veuillez vous connecté</h1>
    <div>
        <div>
        <form class="row g-3" action="traitement_inscription.php" method="POST">
          <div >
            <label for="validationDefaultUsername" class="form-label">Login</label>
            <input type="text" class="form-control" name="login" id="validationDefault03" placeholder="écris ton login">
          </div>
          <div >
            <label for="validationDefaultUsername" class="form-label">email</label>
            <input type="text" class="form-control" name="email" id="validationDefault03" placeholder="écris ton login">
          </div>
          <div >
            <label for="validationDefaultUsername" class="form-label">firstname</label>
            <input type="text" class="form-control" name="firstname" id="validationDefault03" placeholder="écris ton login">
          </div>
          <div >
            <label for="validationDefaultUsername" class="form-label">lastname</label>
            <input type="text" class="form-control" name="lastname" id="validationDefault03" placeholder="écris ton login">
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


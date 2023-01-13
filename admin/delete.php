<?php
require("../config/commandes.php") ; 
$Films = afficher() ; 
session_start();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>Album example · Bootstrap v5.2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Cinéma</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="Ajt.php">Nouveau</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="supp.php" style="font-weight: bold">Suppression</a>
        </li> 
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="affichier.php">Films</a>
        </li>
      </ul>
    <div style="display: flex; justify-content: flex-end; ">
      <a href="deconnexion.php" class="btn btn-danger">Se deconnecter</a>
    </div>
  </div>
</div>
</nav>
    
<div class="album py-5 bg-light">
    <div class="container">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
<form method="post" action="" >

<div class="mb-3">
 
<div class="mb-3">
  <label for="exampleInputPassword1" class="form-label">Identifiant du film </label>
  <input type="number" class="form-control" name="idf" required>
</div>


<button type="submit" class="btn btn-warning" name="supp">Supprimer un Film</button>
</form>
    </div>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

    <?php foreach($Films as $film): ?>
        <div class="col">
          <div class="card shadow-sm">
            <img src="<?= $film->imagee ?>">
            <h3><?= $film->id ?></h3>

            <div class="card-body">
              
            </div>
          </div>
        </div>
    <?php endforeach; ?>

    </div>
</div></div>
    <?php 
	try{
    $chaine = 'mysql:host=localhost;dbname=base2;charset=utf8';
    $user = 'root' ;
    $password = '' ;
    $connexion = new PDO($chaine , $user , $password) ;
}
catch(PDOException $e){
    echo "erreur : ".$e->getMessage();
}
if (isset($_POST['supp'])) {
    try{
      $req=$connexion->prepare("DELETE FROM films WHERE id=?") ; 
      $req->bindValue(1,$_POST['idf']) ; 
      $req->execute() ; 
      echo "Supprimer Bien" ; 
    }
    catch(PDOException $e) 
    {
      echo "erreur:" .$e->getMessage() ; 
    }
}
?>
</body>
</html>
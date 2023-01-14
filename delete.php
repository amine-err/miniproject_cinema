<?php
try {
  require "plugins/PDOconn.php";
  $req = $conn->prepare("SELECT * FROM films");
  $req->execute();
  $Films = $req->fetchAll(PDO::FETCH_OBJ);
} catch (PDOException $err) {
  echo "Connection failed: "  . $err->getMessage() . "<br>";
  exit();
}
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
<header>
        <?php require('plugins/navbar-admin.php'); ?>
</header>
    
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
            <img src="<?= $film->poster ?>">
            <h3><?= $film->idFilm ?></h3>

            <div class="card-body">
              
            </div>
          </div>
        </div>
    <?php endforeach; ?>

    </div>
</div></div>
<?php
if (isset($_POST['supp'])) {
    try{
      require "plugins/PDOconn.php";
      $req=$conn->prepare("DELETE FROM films WHERE idFilm=?") ; 
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
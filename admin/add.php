<?php
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Cinéma</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="Ajt.php"
                            style="font-weight: bold">Nouveau</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="supp.php">Suppression</a>
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
                <form method="post" action="">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Titre de l'image </label>
                        <input type="name" class="form-control" name="Img" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Nom </label>
                        <input type="text" class="form-control" name="Nom">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Prix </label>
                        <input type="number" class="form-control" name="Prix" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Description</label>
                        <textarea type="text" class="form-control" name="Desc" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Genre </label>
                        <input type="text" class="form-control" name="Gg" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">annee </label>
                        <input type="text" class="form-control" name="Ann" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">duree </label>
                        <input type="text" class="form-control" name="Dur" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Resume </label>
                        <input type="text" class="form-control" name="Rr" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Projection </label>
                        <input class="form-check-input" type="text" name="Pro" required>
                    </div>
                    <button type="submit" class="btn btn-success" name="bb">Ajouter un nouveau Film</button>
                </form>
            </div>
        </div>
    </div>
</body>
<?php
if (isset($_POST['bb'])) {
  try{
    require "plugins/PDOconn.php";
    $req=$conn->prepare("INSERT INTO films (imagee,nom,prix,descri,idGenre,annee,duree,resumé,projection) VALUES (?,?,?,?,?,?,?,?,?)");
    $req -> bindValue(1, $_POST['Img']) ;
    $req -> bindValue(2, $_POST['Nom']) ;
    $req -> bindValue(3, $_POST['Prix']) ;
    $req -> bindValue(4, $_POST['Desc']) ;
    $req -> bindValue(5, $_POST['Gg']) ;
    $req -> bindValue(6, $_POST['Ann']) ;
    $req -> bindValue(7, $_POST['Dur']) ;
    $req -> bindValue(8, $_POST['Rr']) ;
    $req -> bindValue(9, $_POST['Pro']) ;
    $req -> execute() ; 
    echo "Ajt bien " ; 
  }
  catch(PDOException $e) 
  {
    echo "Erreur : " .$e->getMessage() ; 
  }
}
?>
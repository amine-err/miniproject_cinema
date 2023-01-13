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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
            <a class="nav-link" href="supp.php">Suppression</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="affichier.php" style="font-weight: bold">Films</a>
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
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3"></div>
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">image</th>
              <th scope="col">Nom</th>
              <th scope="col">Prix</th>
              <th scope="col">Description</th>
              <th scope="col">IdGenre</th>
              <th scope="col">Annee</th>
              <th scope="col">Duree</th>
              <th scope="col">Resumé</th>
              <th scope="col">Projection</th>
              <th scope="col">Editer</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($Films as $film) :  ?>
              <tr>
                <th scope="row"><?= $film->id ?></th>
                <td>
                  <img src="<?= $film->imagee ?>" style="width : 15%">
                </td>
                <td><?= $film->nom ?></td>
                <td style="font-weight: bold; color: green;"><?= $film->prix ?>$</td>
                <td><?= substr($film->descri, 0, 10) ?>...</td>
                <td><?= $film->idGenre ?></td>
                <td><?= $film->annee ?></td>
                <td><?= $film->duree ?></td>
                <td><?= $film->resumé ?></td>
                <td><?= $film->projection ?></td>
                <td>
                  <a href="modifier.php?pdt=<?= $film->id ?>"><i class="fa fa-pencil"></i></a>
                </td>
              </tr>
            <?php endforeach; ?>
        </table>
      </div>
    </div>
  </div>
</body>

</html>
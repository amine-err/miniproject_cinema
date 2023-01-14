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
  <title>Admin page</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>

<body>
  <header>
  <?php require('plugins/navbar-admin.php'); ?>
  </header>
  <div class="album py-5 bg-light">
    <div class="container">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3"></div>
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">poster</th>
              <th scope="col">title</th>
              <th scope="col">price</th>
              <th scope="col">description</th>
              <th scope="col">genre</th>
              <th scope="col">year</th>
              <th scope="col">duration</th>
              <th scope="col">Projection</th>
              <th scope="col">Edit</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($Films as $film) :  ?>
              <tr>
                <th scope="row"><?= $film->idFilm ?></th>
                <td>
                  <img src="<?= $film->poster ?>" style="width : 100%">
                </td>
                <td><?= $film->title ?></td>
                <td style="font-weight: bold; color: green;"><?= $film->price ?>$</td>
                <td><?= substr($film->description, 0, 10) ?>...</td>
                <td><?= $film->genre ?></td>
                <td><?= $film->year ?></td>
                <td><?= $film->duration ?></td>
                <td><?php
                    if ($film->inProjection) {
                      echo "In projection";
                    } ?>
                </td>
                <td>
                  <a href="modify.php?pdt=<?= $film->id ?>"><i class="fa fa-pencil"></i></a>
                </td>
              </tr>
            <?php endforeach; ?>
        </table>
      </div>
    </div>
  </div>
</body>

</html>
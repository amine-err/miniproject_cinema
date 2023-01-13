<?php
require "plugins/showErrors.php";
session_start();
if (isset($_SESSION['account']) and $_SESSION['account']['type'] == 'admin') {
  header('Location: admin.php');
  exit();
}
try {
  require "plugins/PDOconn.php";
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stmt = $conn->prepare("SELECT * FROM films
    WHERE title LIKE ? and year=? and genre LIKE ? and rating>=? and inProjection=?");
    $stmt->execute([
      $_POST['title'],
      $_POST['year'],
      $_POST['genre'],
      $_POST['rating'],
      $_POST['inProjection']
    ]);
  } else {
    $stmt = $conn->prepare("SELECT * FROM films");
    $stmt->execute();
  }
  $data = $stmt->fetchAll(PDO::FETCH_OBJ);
  unset($conn, $stmt);
} catch (PDOException $err) {
  echo "Connection failed: "  . $err->getMessage() . "<br>";
  exit();
}
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }

    .b-example-divider {
      height: 3rem;
      background-color: rgba(0, 0, 0, .1);
      border: solid rgba(0, 0, 0, .15);
      border-width: 1px 0;
      box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
    }

    .b-example-vr {
      flex-shrink: 0;
      width: 1.5rem;
      height: 100vh;
    }

    .bi {
      vertical-align: -.125em;
      fill: currentColor;
    }

    .nav-scroller {
      position: relative;
      z-index: 2;
      height: 2.75rem;
      overflow-y: hidden;
    }

    .nav-scroller .nav {
      display: flex;
      flex-wrap: nowrap;
      padding-bottom: 1rem;
      margin-top: -1px;
      overflow-x: auto;
      text-align: center;
      white-space: nowrap;
      -webkit-overflow-scrolling: touch;
    }
  </style>
</head>

<body>
  <?php require "plugins/header-user.php"; ?>
  <main>
  <form method="POST" action="index.php" class="form-inline my-2 my-lg-0">
    <input class="class=mb-3" type="text" placeholder="Film title" name="title" aria-label="Search">
    <button class="class=mb-3" type="submit">Search</button>
  </form>
  <?php require "plugins/films-user.php"; ?>
  </main>
</body>

</html>
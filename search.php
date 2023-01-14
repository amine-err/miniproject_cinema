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
    $title = isset($_POST['title']) ? $_POST['title'] : '';
    $genre = isset($_POST['genre']) ? $_POST['genre'] : '';
    $year = isset($_POST['year']) ? $_POST['year'] : '';
    $rating = isset($_POST['rating']) ? $_POST['rating'] : 0;
    $inProjection = isset($_POST['inProjection']) ? $_POST['inProjection'] : '';
    $stmt = $conn->prepare("SELECT * FROM films
    WHERE title LIKE ? and CAST(year as CHAR) LIKE ? and genre LIKE ? and rating>=? and CAST(year as CHAR) LIKE ?");
    $stmt->execute([
      "%$title%",
      "%$year%",
      "%$genre%",
      $rating,
      "%$inProjection%",
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
  <title>Search</title>
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
  <header>
    <?php
    if (isset($_SESSION['account']) and $_SESSION['account']['type'] == 'user') {
      require "plugins/navbar-user.php";
    } else {
      require "plugins/navbar.php";
    }
    ?>
  </header>
  <main>
    <div class="container my-3">
      <div class="row">
        <div class="col-12">
          <div class="card shadow-sm">
            <form id="frm" action="search.php" method="post">
              dqd
            </form>
          </div>
        </div>
      </div>
    </div>
    <?php require "plugins/films-user.php"; ?>
  </main>
</body>

</html>
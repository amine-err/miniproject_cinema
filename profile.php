<?php
require "plugins/showErrors.php";
require_once "plugins/f_arrayTable.php";
session_start();
if (!isset($_SESSION['account']) or $_SESSION['account']['type'] != 'user') {
  header('Location: login.php');
  exit();
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
  $id = $_POST['idFilm'];
  $_SESSION['order'][$id] = array(
    "idFilm" => $_POST['idFilm'],
    "quantity" => $_POST['quantity'],
    "hour" => $_POST['hour'],
    "price" => 50,
    "poster" => $_POST['poster'],
  );
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Profile page</title>
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
  <?php if (isset($_SESSION['order'])) {  ?>
    <div>
      <div class="album py-5 bg-light">
        <div class="container">
          <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3"></div>
          <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <h3 class="col">Shopcart orders</h3>
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">poster</th>
                  <th scope="col">quantity</th>
                  <th scope="col">price</th>
                  <th scope="col">hour</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($_SESSION['order'] as $order) :  ?>
                  <tr>
                    <th scope="row"><?= $order['idFilm'] ?></th>
                    <td>
                      <img src="<?= $order['poster'] ?>" style="width: 30%">
                    </td>
                    <td><?= $order['quantity'] ?></td>
                    <td style="font-weight: bold; color: green;"><?= $order['price'] ?>$</td>
                    <td><?= $order['hour'] ?></td>
                  </tr>
                <?php endforeach; ?>
            </table>
            <div>
              <a href="order.php" class="btn btn-danger">Confirm order</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div>
    <?php } ?>
    <?php
    try {
      require "plugins/PDOconn.php";
      $stmt = $conn->prepare("
    SELECT o.idOrder, f.poster, f.title, f.year, o.hour, o.quantity, o.price, o.createdDate
    FROM orders o, films f
    WHERE o.idFilm = f.idFilm and o.idAccount=? ");
      $stmt->execute([$_SESSION['account']['id']]);
      $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
      unset($conn, $stmt);
    } catch (PDOException $err) {
      echo "Connection failed: "  . $err->getMessage() . "<br>";
      exit();
    }
    ?>
    <div>
      <div class="album py-5 bg-light">
        <div class="container">
          <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3"></div>
          <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <h3>Confirmed orders</h3>
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">poster</th>
                  <th scope="col">title</th>
                  <th scope="col">price</th>
                  <th scope="col">year</th>
                  <th scope="col">hour</th>
                  <th scope="col">quantity</th>
                  <th scope="col">createdDate</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($data as $order) :  ?>
                  <tr>
                    <th scope="row"><?= $order['idOrder'] ?></th>
                    <td>
                      <img src="<?= $order['poster'] ?>" style="width: 60%">
                    </td>
                    <td><?= $order['title'] ?></td>
                    <td style="font-weight: bold; color: green;"><?= $order['price'] ?>$</td>
                    <td><?= $order['year'] ?></td>
                    <td><?= $order['hour'] ?></td>
                    <td><?= $order['quantity'] ?></td>
                    <td><?= $order['createdDate'] ?></td>
                  </tr>
                <?php endforeach; ?>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div>
    </div>
</body>

</html>
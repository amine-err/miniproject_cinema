<?php
require "plugins/showErrors.php";
require_once('plugins/poster.php');
session_start();
if (isset($_SESSION['account']) and $_SESSION['account']['type'] == 'admin') {
  header('Location: admin.php');
  exit();
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
  try {
    require "plugins/PDOconn.php";
    $stmt = $conn->prepare(
      "SELECT * FROM films f, programs p
    WHERE f.idFilm=? or f.idFilm=?"
    );
    $stmt->execute([$_POST['idFilm'], $_POST['idFilm']]);
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    unset($conn, $stmt);
  } catch (PDOException $err) {
    echo "Connection failed: "  . $err->getMessage() . "<br>";
    exit();
  }
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <title>Film page</title>
  <style>
    body {
      background-color: #edf1f5;
    }

    .card {
      margin-bottom: 30px;
    }

    .card {
      position: relative;
      display: flex;
      flex-direction: column;
      min-width: 0;
      word-wrap: break-word;
      background-color: #fff;
      background-clip: border-box;
      border: 0 solid transparent;
      border-radius: 0;
    }

    .card .card-subtitle {
      font-weight: 300;
      margin-bottom: 10px;
      color: #8898aa;
    }

    .table-product.table-striped tbody tr:nth-of-type(odd) {
      background-color: #f3f8fa !important
    }

    .table-product td {
      border-top: 0px solid #dee2e6 !important;
      color: #728299 !important;
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
  <div class="container">
    <div class="card">
      <div class="card-body">
        <h3 class="card-title"><?= $data[0]['title']; ?></h3>
        <div class="row">
          <div class="col-lg-5 col-md-5 col-sm-6">
            <div class="white-box text-center"><img src="<?= poster($data[0]['title']) ?>" class="float-lg-start w-100 rounded pb-2"></div>
          </div>
          <div class="col-lg-7 col-md-7 col-sm-6">
            <h4 class="box-title mt-5">Movie description</h4>
            <p><?= $data[0]['description']; ?></p>
            <h2 class="mt-5">
              <small class="text-success">50 MAD</small>
            </h2>
            <?php
            if (isset($data[0]['idProgram'])) { ?>
              <form id="frm" action="profile.php" method="post">
                <?php
                $arrayhours = explode(",", $data[0]['hours']);
                foreach ($arrayhours as $key => $value) { ?>
                  <input value="<?= $value; ?>" type="radio" class="btn-check" name="hour" id="hour<?= $key ?>" autocomplete="off">
                  <label class="btn btn-outline-primary" for="hour<?= $key ?>"><?= $value; ?></label>
                <?php } ?>
                <div class="form-outline">
                  <label class="form-label" for="typeNumber">Quantity</label>
                  <input name="quantity" type="number" id="typeNumber" class="form-control" />
                </div>
                <br>
                <input type="hidden" name="idFilm" value="<?= $_POST['idFilm'] ?>">
                <input type="hidden" name="poster" value="<?= $data[0]['poster'] ?>">
                <input type="submit" class="btn btn-primary btn-rounded" value="Buy ticket">
              </form>
            <?php } else {
              echo "<h4 class='box-title mt-5'>No program is available for this movie!</h4>";
            } ?>
            <h5 class="box-title mt-5">Date airing: <?= $data[0]['date']; ?></h5>
            <h5 class="box-title mt-1">In room Nb: <?= $data[0]['room']; ?></h5>
          </div>
          <div class="col-lg-12 col-md-12 col-sm-12">
            <h3 class="box-title mt-5">Movie Infos</h3>
            <div class="table-responsive">
              <table class="table table-striped table-product">
                <tbody>
                  <tr>
                    <td width="390">Genre</td>
                    <td><?= $data[0]['genre']; ?></td>
                  </tr>
                  <tr>
                    <td>Year</td>
                    <td><?= $data[0]['year']; ?></td>
                  </tr>
                  <tr>
                    <td>Duration</td>
                    <td><?= $data[0]['duration']; ?></td>
                  </tr>
                  <tr>
                    <td>Rating</td>
                    <td><?= $data[0]['rating']; ?>/5</td>
                  </tr>
                  <tr>
                    <td>Director</td>
                    <td><?= $data[0]['director']; ?></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
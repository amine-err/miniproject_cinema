<?php
require "plugins/showErrors.php";
session_start();
if (isset($_SESSION['account'])) {
  header('Location: index.php');
  exit();
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST["username"];
  $password = md5($_POST["password"]);
  try {
    require "plugins/PDOconn.php";
    $stmt = $conn->prepare("
      INSERT INTO accounts (username, password, type)
      VALUES (?, ?, ?) ");
    $stmt->execute([$username, $password, 'user']);
    $_SESSION['account']['type'] = $data[0]['type'];
    $_SESSION['account']['id'] = $data[0]['idAccount'];
    header('Location: index.php');
    exit();
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
  <title>Signup</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <style>
    .rounded-t-5 {
      border-top-left-radius: 0.5rem;
      border-top-right-radius: 0.5rem;
    }

    @media (min-width: 992px) {
      .rounded-tr-lg-0 {
        border-top-right-radius: 0;
      }

      .rounded-bl-lg-5 {
        border-bottom-left-radius: 0.5rem;
      }
    }
  </style>
</head>

<body class="bg-dark">
  <header>
    <?php require "plugins/nav.php"; ?>
  </header>
  <br>
  <div class="row w-100">
    <div class="col-3"></div>
    <div class="col-6 card mb-3">
      <h1 class="text-center h2 mt-5 fw-normal">Create a new account</h1>
      <div class="row g-0 align-items-center">
        <div class="col-4">
          <img src="images/popcorn.webp" class="w-100 rounded-t-5 rounded-tr-lg-0 rounded-bl-lg-5" />
        </div>
        <div class="col-8">
          <div class="card-body py-5 px-5">

            <form id="frm" action="signup.php" method="post">
              <!-- Username input -->
              <div class="form-outline mb-4">
                <input type="text" id="form2Example1" class="form-control" name="username" required />
                <label class="form-label" for="form2Example1">Username</label>
              </div>

              <!-- Password input -->
              <div class="form-outline mb-4">
                <input type="password" id="form2Example2" class="form-control" name="password" required />
                <label class="form-label" for="form2Example2">Password</label>
              </div>

              <!-- 2 column grid layout for inline styling -->
              <div class="row mb-4">
                <div class="col">
                  <!-- Simple link -->
                  <p class="form-label">You already have an account? <a href='login.php'>login here!</a></p>
                </div>
              </div>

              <!-- Submit button -->
              <input type="submit" id="sbmt" value="Signup" class="btn btn-primary btn-block mb-4">

            </form>

          </div>
        </div>
      </div>
    </div>
    <div class="col-3"></div>
  </div>
</body>

</html>
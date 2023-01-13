<?php
require "plugins/showErrors.php";
session_start();
if (!isset($_SESSION['account'])) {
  header('Location: index.php');
  exit();
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST["username"];
  $password = $_POST["password"];
  try {
    require "plugins/PDOconn.php";
    $stmt = $conn->prepare("SELECT * FROM accounts WHERE username=?");
    $stmt->execute([$username]);
    if ($stmt->rowCount()) {
      $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
      unset($stmt, $conn);
      if (md5($password) == $data[0]['password']) {
        $_SESSION['account']['type'] = $data[0]['type'];
        $_SESSION['account']['id'] = $data[0]['idAccount'];
        header('Location: index.php');
        exit();
      } else {
        echo "wrong password try again!";
      }
    } else {
      echo "account not found! try signing up";
    }
  } catch (PDOException $err) {
    echo "Connection failed: "  . $err->getMessage() . "<br>";
    exit();
  }
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
  <br>
  <br>
  <br>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <form id="frm" action="login.php" method="post">
          <div class="mb-3">
            <label for="username" class="form-label">Username</label><br>
            <input type="text" id="username" name="username" class="form-control" required style="width: 50%;"><br>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label><br>
            <input type="password" id="password" name="password" class="form-control" required style="width: 50%;"><br><br>
          </div>
          <input type="submit" id="sbmt" value="login" class="btn btn-danger"><br>
          <p class="form-label">You don't have an account? <a href='signup.php'><button class="btn btn-danger">signup</button></a></p>
        </form>
      </div>
      <div class="col-md-3"></div>
    </div>
  </div>
</body>

</html>
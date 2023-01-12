<?php
require "plugins/showErrors.php";
session_start();
if (isset($_SESSION['account'])) {
  header('Location: index.php');
  exit();
}
elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST["username"];
  $password = $_POST["password"];
  try {
    require "plugins/PDOconn.php";
    $stmt = $conn->prepare("SELECT * FROM accounts WHERE username=?");
    $stmt->execute([$username]);
    if($stmt->rowCount()) {
      $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
      unset($stmt, $conn);
      if( md5($password)==$data[0]['password'] ) {
        $_SESSION['account']['type'] = $data[0]['type'];
        $_SESSION['account']['id'] = $data[0]['idAccount'];
        header('Location: index.php');
        exit();
      } else { echo "wrong password try again!"; }
    } else { echo "account not found! try signing up"; }
  } catch(PDOException $err) {
    echo "Connection failed: "  .$err->getMessage()."<br>";
    exit();
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
	<title>Login</title>
</head>
<body>
  <h1>Login page</h1>
  <form id="frm" action="login.php" method="post">
    <fieldset>
      <label for="username">Username</label><br>
      <input type="text" id="username" name="username" required><br>
      <label for="password">Password</label><br>
      <input type="password" id="password" name="password" required><br><br>
      <input type="submit" id="sbmt" value="login"><br>
      <p>You don't have an account? <a href='signup.php'><button>signup</button></a></p>
    </fieldset>
  </form>
</body>
</html>

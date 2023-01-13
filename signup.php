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
    $stmt->execute([ $username, $password, 'user' ]);
    header('Location: login.php');
    exit();
  unset($conn, $stmt);
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
	<title>Signup</title>
</head>
<body>
  <h1>Signup page</h1>
  <form id="frm" action="signup.php" method="post">
    <fieldset>
      <label for="username">Username</label><br>
      <input type="text" id="username" name="username" required><br>
      <label for="password">Password</label><br>
      <input type="password" id="password" name="password" required><br><br>
      <input type="submit" id="sbmt" value="signup"><br>
      <p>You already have an account? <a href='login.php'><button>login</button></a></p>
    </fieldset>
  </form>
</body>
</html>

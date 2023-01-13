<?php
require "plugins/showErrors.php";
require_once "plugins/f_htmlTable.php";
session_start();
if (!isset($_SESSION['account']) or $_SESSION['account']['type']!='user') {
  header('Location: index.php');
  exit();
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Profile</title>
  <link rel="stylesheet" href="styles/profile.css">
</head>
<body>
<div>
    <h3>Shopcart orders</h3>
<?php
htmlTable($_SESSION['order'], "class='table-style'");
?>
</div>
<div>
  <h3>Confirmed orders</h3>
<?php
try {
  require "plugins/PDOconn.php";
  $stmt = $conn->prepare("
    SELECT o.idOrder, f.title, f.year, o.hour, o.quantity, o.price, o.createdDate
    FROM orders o, films f
    WHERE o.idFilm = f.idFilm and o.idAccount=? ");
  $stmt->execute([ $_SESSION['account']['id'] ]);
  $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
  htmlTable($data, "class='table-style'");
unset($conn, $stmt);
} catch(PDOException $err) {
  echo "Connection failed: "  .$err->getMessage()."<br>";
  exit();
}
?>
</div>
</body>
</html>

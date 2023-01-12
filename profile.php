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
</head>
<body>
<div>
    <h3>Shopcart orders</h3>
<?php
//echo htmlTable($_SESSION['order']);
?>
</div>
<div>
  <h3>Confirmed orders</h3>
<?php
require "plugins/PDOconn.php";
$stmt = $conn->query("SELECT o.*, f.title FROM orders o, films f WHERE o.idFilm = f.idFilm");
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo htmlTable($data);
?>
</div>
</body>
</html>

<?php
require "plugins/showErrors.php";
session_start();
if (isset($_SESSION['account']) and $_SESSION['account']['type']=='admin') {
  header('Location: admin.php');
  exit();
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
	try {
    require "plugins/PDOconn.php";
    $stmt = $conn->prepare("SELECT * FROM films WHERE idFilm=?");
    $stmt->execute([$_POST['idFilm']]);
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<title>Film page</title>
</head>
<body>
<div class="container">
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>

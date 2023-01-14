<?php
require "plugins/showErrors.php";
session_start();
try {
  require "plugins/PDOconn.php";
  $req = $conn->prepare("INSERT INTO orders
  (idAccount,idFilm,hour,quantity,price)
  VALUES (?,?,?,?,?)");
  foreach ($_SESSION['order'] as $order) {
    $req->bindValue(1, $_SESSION['account']['id']);
    $req->bindValue(2, $order['idFilm']);
    $req->bindValue(3, $order['hour']);
    $req->bindValue(4, $order['quantity']);
    $req->bindValue(5, $order['price']);
    $req->execute();
    echo "Ajt bien ";
  }
  unset($_SESSION['order']);
  header('Location: profile.php');
  exit();
} catch (PDOException $e) {
  echo "Erreur : " . $e->getMessage();
}

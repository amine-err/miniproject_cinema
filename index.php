<?php
session_start();
if (isset($_SESSION['account']) and $_SESSION['account']['type']=='admin') {
  header('Location: admin.php');
  exit();
}
?> 

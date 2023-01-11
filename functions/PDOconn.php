<?php
function PDOconn() {
	$server = "localhost"; $user = "root"; $pass = ""; $db = "WebCinema";
	$conn = new PDO("mysql:host=$server;dbname=$db", $user, $pass);
	return $conn;
}
?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tekno_db";

//Create Connection
$conn = "mysql:host=$servername;dbname=$dbname;charset=UTF8";

try {
	$pdo = new PDO($conn, $username, $password);

	if ($pdo) {
		
	}
} catch (PDOException $e) {
	echo $e->getMessage();
}

?>
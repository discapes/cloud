<?php
	$servername = "localhost";
	$username = "cloud";
	$password = "password123!";
	$dbname = "clouddb";
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
  		die("Connection failed: " . $conn->connect_error);
	}
?>

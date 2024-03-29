<?php
require 'mysql.php';
error_reporting(E_ALL & ~E_NOTICE);
$ip = $_SERVER['REMOTE_ADDR'];

$stmt = $conn->prepare("SELECT ip FROM IPlog WHERE ip=?");
$stmt->bind_param("s", $ip);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    $hostname = $_SERVER['REMOTE_HOST'] ?? $_SERVER['REMOTE_ADDR']; 
    $date = date("H:i d.m.Y");
    $stmt = $conn->prepare("INSERT INTO IPlog (ip,hostname,date) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $ip, $hostname, $date);
    $stmt->execute();
    if ($conn->error) error_log($conn->error);
}
$conn->close();
?>

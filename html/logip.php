<?php
require 'mysql.php';
error_reporting(E_ALL & ~E_NOTICE);
$ip = $_SERVER['REMOTE_ADDR'];
$sql = "SELECT ip FROM IPlog WHERE ip='$ip'";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    try { $hostname = $_SERVER['REMOTE_HOST']; 
    } catch (Exception $e) {
        
    }
    $date = date("H:i d.m.Y");
    $stmt = $conn->prepare("INSERT INTO IPlog (ip,hostname,date) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $ip, $hostname, $date);
    $stmt->execute();
}
$conn->close();
?>

<?php
require  "variables.php";
require "mysql.php";

$stmt = $conn->prepare("SELECT id FROM Files WHERE filename=?");
$stmt->bind_param("s", $_POST["filename"]);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $id = $row["id"];
    echo 'http://' . $serverurl . '/get?id=' . $id;
} 

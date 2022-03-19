<?php
require  "variables.php";
require "mysql.php";

$sql = "SELECT id FROM Files WHERE filename=\"" . $_POST["filename"] . "\"";
$result = $conn->query($sql);
if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $id = $row["id"];
    echo 'http://' . $serverurl . '/get?id=' . $id;
} 

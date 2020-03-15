<!DOCTYPE html>
<html>
<head>
<title>Site 58</title>
<link rel="icon" type="image/png" href="favicon.png">
</head>
<body style="background-image: url('lightbg.png')">
	<?php
require '../mysql.php';
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $getnum = $_GET["num"];
    $query = "SELECT filename FROM Files WHERE num=\"$getnum\"";
    $result = $conn->query($query);
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $filetodel = $row["filename"];
        unlink("/var/www/files/".$filetodel);
        $query = "DELETE FROM Files WHERE num=\"$getnum\"";
        $conn->query($query);
        echo "<script>location.href='filelog'</script>";
    } else {
        echo '<h1 style="margin-top:100px;text-align:center;color:red">Invalid file number</h1>';
        ob_flush();
        flush();
        sleep(2);
        echo "<script>location.href='../home'</script>";
    }
}
?>
</body>
</html>

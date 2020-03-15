<!DOCTYPE html>
<html>
<head>
<title>Site 58</title>
<link rel="icon" type="image/png" href="favicon.png">
</head>
<body style="background-image: url('lightbg.png')">
	<?php
require 'mysql.php';
require 'download.php';
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $getid = $_GET["id"];
    $query = "SELECT filename FROM Files WHERE id=\"$getid\"";
    $result = $conn->query($query);
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        checkPath($row["filename"]);
        echo "<script>location.href='../home'</script>";
    } else {

        echo '<h1 style="margin-top:100px;text-align:center;color:red">Invalid file UUID</h1>';
        ob_flush();
        flush();
        sleep(2);
        echo "<script>location.href='../home'</script>";
    }
}
?>
</body>
</html>

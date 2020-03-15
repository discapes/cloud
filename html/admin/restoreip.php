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
    $query = "SELECT ip FROM DelIPlog WHERE num=\"$getnum\"";
    $result = $conn->query($query);
    if ($result->num_rows == 1) {
        echo "<script>location.href='deliplog'</script>";
        $row = $result->fetch_assoc();
        $query = 'INSERT INTO IPlog SELECT * FROM DelIPlog WHERE num="'.$getnum.'"';
        $conn->query($query);
        $query = "DELETE FROM DelIPlog WHERE num=\"$getnum\"";
        $conn->query($query);
    } else {
        echo '<h1 style="margin-top:100px;text-align:center;color:red">Invalid IP number</h1>';
        ob_flush();
        flush();
        sleep(2);
        echo "<script>location.href='../home'</script>";
    }
}
?>
</body>
</html>

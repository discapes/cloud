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
    $gettype = $_GET["type"];
    if($gettype=="paste") {
        $conn->query('UPDATE Files SET isPaste="1" WHERE num="'.$getnum.'"');
    } else {
        $conn->query('UPDATE Files SET isPaste="0" WHERE num="'.$getnum.'"');
    }
    echo "<script>location.href='filelog'</script>";
}
?>
</body>
</html>

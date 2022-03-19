<!DOCTYPE html>
<html>
<head>
<title>Site 58</title>
<link rel="icon" type="image/png" href="favicon.png">
</head>
<body style="background-image: url('lightbg.png')">
	<?php
require '../mysql.php';
require '../variables.php';
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $getnum = $_GET["num"];
    $query = "SELECT filename FROM Trash WHERE num=\"$getnum\"";
    $result = $conn->query($query);
    if ($result->num_rows == 1) {
        echo "<script>location.href='trashlog'</script>";
        $row = $result->fetch_assoc();
        $filetores = $row["filename"];
        rename($rootdir . 'trash/'.$filetores, $rootdir . 'files/'.$filetores);
        #unlink($rootdir . "files/".$filetodel);
        $query = 'INSERT INTO Files SELECT * FROM Trash WHERE num="'.$getnum.'"';
        $conn->query($query);
        $query = 'DELETE FROM Trash WHERE num="'.$getnum.'"'; 
        $conn->query($query);
        #echo $conn->errno . ": " . $conn->error . "<br>";
        #echo $query;
    } else {
        echo '<h1 style="margin-top:100px;text-align:center;color:red">Invalid file number</h1>';
        ob_flush();
        flush();
        sleep(1);
        echo "<script>location.href='/'</script>";
    }
}
?>
</body>
</html>

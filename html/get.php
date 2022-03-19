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
require 'variables.php';
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $getid = $_GET["id"];
    $query = "SELECT filename, isPaste FROM Files WHERE id=\"$getid\"";
    $result = $conn->query($query);
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $filename = $row["filename"];
        if ($row["isPaste"]) {
            $filepath = $rootdir . "files" . $separator . $filename;
            $realfilepath = realpath($filepath);
            if ($filepath === $realfilepath) {
                echo nl2br(file_get_contents($realfilepath));

            } else {  
                echo '<h1 style="margin-top:100px;text-align:center;color:red">Invalid file</h1>';
                ob_flush();
                flush();
                sleep(1);
                echo "<script>location.href='/'</script>";
            }
        } else {
            checkPath($filename, "files");
            echo "<script>location.href='/'</script>";
        }

    } else {

        echo '<h1 style="margin-top:100px;text-align:center;color:red">Invalid file UUID</h1>';
        ob_flush();
        flush();
        sleep(1);
        echo "<script>location.href='/'</script>";
    }
}
?>
</body>
</html>

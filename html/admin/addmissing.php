<!DOCTYPE html>
<html>
<head>
<title>Admin Panel</title>
<link rel="icon" type="image/png" href="../favicon.png">
	<?php require '../uuid.php'; require '../mysql.php'; ?>
    </head>
<body style="background-image: url('../lightbg.png')">
</body>

<?php
$dir = "/var/www/files/";
$filelist = preg_grep('/^([^.])/', scandir($dir));
echo "<h1>Files added:</h1>";
$anyfiles = false;
foreach ($filelist as $filename) {
    $stmt = $conn->prepare("SELECT filename FROM Files WHERE filename=(?)");
    $stmt->bind_param("s", $filename);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows == 0) {
        $anyfiles = true;
        $randomid = generate();
        $date = date("H:i d.m.Y");
        $stmt = $conn->prepare("INSERT INTO Files (id, filename, date) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $randomid, $filename, $date);
        $stmt->execute();
        echo $conn->errno . ": " . $conn->error . "<br>";
        echo nl2br("<h2 style=\"margin-top:-40px;text-align:center;color:blue\">" . $filename . "</h2>\n");
    }
}
if (!$anyfiles) {
    echo "<h1 style=\"margin-top:100px;text-align:center;color:red\">None</h1>\n";
}

ob_flush();
flush();
sleep(5);
echo "<script>location.href='filelog'</script>";
?>
</html>

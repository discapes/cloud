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
$basename = basename($_FILES["upload"]["name"]);
$uploadname = $basename;
$manycopies = 1;
$dotpos = strrpos($basename, ".");
while (true) {
    $stmt = $conn->prepare("SELECT filename FROM Files WHERE filename=(?)");
    $stmt->bind_param("s", $uploadname);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        break;
    } else {

        $uploadname = substr_replace($basename, " (" . $manycopies . ")", $dotpos, 0);
        $manycopies = $manycopies + 1;
    }
}
while (true) {
    $stmt = $conn->prepare("SELECT filename FROM Trash WHERE filename=(?)");
    $stmt->bind_param("s", $uploadname);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows == 0) {
        break;
    } else {
        
        $uploadname = substr_replace($basename, " (" . $manycopies . ")", $dotpos, 0);
        $manycopies = $manycopies + 1;
    }
}

$basepath = "/var/www/files/";
$uploadpath = $basepath . $uploadname;

if (move_uploaded_file($_FILES["upload"]["tmp_name"], $uploadpath)) {

    // while True {
    // $randomid = random;
    // $sql = "SELECT * FROM Files WHERE id='$randomid'";
    // $result = $conn->query($sql);
    // if ($result->num_rows == 0) {
    // break;
    // }
    // }
    
    if($_POST["isPaste"] == "yes") {
        $isPaste = "1";
    } else {
        $isPaste = "0";
    }
    $randomid = generate();
    $date = date("H:i d.m.Y");
    $stmt = $conn->prepare("INSERT INTO Files (id, filename, date, isPaste) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sssi", $randomid, $uploadname, $date, $isPaste);
    $stmt->execute();
    $conn->close();

    echo nl2br($randomid . "\n");
    echo nl2br($uploadname . "\n");
    echo $date;
    
    echo '<h1 style="margin-top:100px;text-align:center;color:green">Success!</h1>';
    ob_flush();
    flush();
    sleep(2);
    echo "<script>location.href='panel'</script>";
} else {
    echo nl2br($randomid . "\n");
    echo nl2br($uploadname . "\n");
    echo $date;
    echo '<h1 style="margin-top:100px;text-align:center;color:red">Error!</h1>';
    ob_flush();
    flush();
    sleep(5);
    // echo "<script>location.href='../home'</script>";
}
?>
</html>

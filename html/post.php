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
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $filename = $_POST["filename"];

        $stmt = $conn->prepare("SELECT id, isPaste FROM Files WHERE filename=?");
        $stmt->bind_param("s", $filename);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $getid = $row["id"];
            if ($row["isPaste"]) {

                $filepath = $rootdir . "files" . "$separator" . $filename;
                $realfilepath = realpath($filepath);
                if ($filepath === $realfilepath) {
                    echo file_get_contents($realfilepath);
                } else {
                    echo $getid;
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
            echo $getid;
            echo '<h1 style="margin-top:100px;text-align:center;color:red">Invalid file</h1>';
            ob_flush();
            flush();
            sleep(1);
            echo "<script>location.href='/'</script>";
        }
    }
    ?>
</body>

</html>
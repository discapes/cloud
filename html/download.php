<?php

require "variables.php";

function checkPath($filename, $folder)
{
    //$filename = ($_POST["name"]);
    global $rootdir, $separator;
    $filepath = $rootdir . $folder . $separator . $filename;
    $realfilepath = realpath($filepath);
    if ($filepath === $realfilepath) {
        echo $realfilepath;
        startDownload($realfilepath);
    } else {
        global $invalidfile;
        $invalidfile = true;
        echo '<h1 style="margin-top:100px;text-align:center;color:red">Invalid file</h1>';
        ob_flush();
        flush();
        sleep(1);
        echo "<script>location.href='/'</script>";
    }
}

function startDownload($downloadpath)
{
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . basename($downloadpath) . '"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($downloadpath));
    ob_clean();
    flush(); // Flush system output buffer
    readfile($downloadpath);
    exit();
}
?>

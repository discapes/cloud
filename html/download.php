<?php

function checkPath($filename, $folder)
{
    // $filename = ($_POST["name"]);
    $filepath = "/var/www/".$folder."/" . $filename;
    $realfilepath = realpath($filepath);
    if ($filepath === $realfilepath) {
        echo $realfilepath;
        startDownload($realfilepath);
    } else {
        global $invalidfile;
        $invalidfile = true;
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

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
$filename = $_POST["filename"];
$paste = $_POST["text"];
if ($_GET["new"] == "yes") {
    $stmt = $conn->prepare("SELECT filename FROM Files WHERE filename=(?)");
    $stmt->bind_param("s", $filename);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        $basepath = "/var/www/files/";
        $filepath = $basepath . $filename;

        $isPaste = "1";
        $randomid = generate();
        $date = date("H:i d.m.Y");
        $stmt = $conn->prepare("INSERT INTO Files (id, filename, date, isPaste) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sssi", $randomid, $filename, $date, $isPaste);
        $stmt->execute();
        $conn->close();

        echo nl2br($randomid . "\n");
        echo nl2br($filename . "\n");
        echo $date;
        file_put_contents("/var/www/files/" . $filename, $paste);
        echo '<h1 style="margin-top:100px;text-align:center;color:green">Success!</h1>';
        ob_flush();
        flush();
        sleep(2);
        echo "<script>location.href='../home'</script>";
    } else {
        echo "
                    <script>
                     /**
                     * sends a request to the specified url from a form. this will change the window location.
                     * @param {string} path the path to send the post request to
                     * @param {object} params the paramiters to add to the url
                     * @param {string} [method=post] the method to use on the form
                     */
    
                    function post(path, params, method='post') {
    
                      // The rest of this code assumes you are not using a library.
                      // It can be made less wordy if you use one.
                      const form = document.createElement('form');
                      form.method = method;
                      form.action = path;
    
                      for (const key in params) {
                        if (params.hasOwnProperty(key)) {
                          const hiddenField = document.createElement('input');
                          hiddenField.type = 'hidden';
                          hiddenField.name = key;
                          hiddenField.value = params[key];
    
                          form.appendChild(hiddenField);
                        }
                      }
    
                      document.body.appendChild(form);
                      form.submit();
                    }
                    post('newpaste?filename=" . $_POST["filename"] . "',  {paste: '" . $paste . "'});
                    </script>";
    }
}
?>
</html>

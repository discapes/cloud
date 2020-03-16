<!DOCTYPE html>
<html>
<head>
<title>Site 58</title>
<link rel="icon" type="image/png" href="favicon.png">
    <?php
    require 'download.php';
    require 'logip.php';
    require 'mysql.php';
    ?>
  </head>
<body style="background-image: url('lightbg.png')">
	<div style="margin-top: 100px" align="center">
		<form>
			<input type="submit" value="Refresh" />
		</form>
		<br>
		<form method="post">
			<input type="text" placeholder="File name" name="filename" required>
			<br>
          <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if ($_POST["submit"] == "Download (POST)") {

                $sql = "SELECT id, isPaste FROM Files WHERE filename=\"" . $_POST["filename"] . "\"";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                if ($row["isPaste"]) {
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
                    post('post', {id: '".$row["id"]."'});
                    </script>";
                } else {
                    checkPath($_POST["filename"], "files");
                    $invalidfile = false;
                    if ($invalidfile == true) {
                        echo "<span id=\"invalidfile\" style=\"color:red\">Invalid file!</span>
	                       <script>
	   	                   setTimeout(function() {document.getElementById(\"invalidfile\").hidden = true}, 2000);
                            </script>";
                    }
                }
            } elseif ($_POST["submit"] == "Get download link (GET)") {
                $sql = "SELECT id FROM Files WHERE filename=\"" . $_POST["filename"] . "\"";
                $result = $conn->query($sql);
                if ($result->num_rows == 1) {
                    $row = $result->fetch_assoc();
                    $id = $row["id"];
                    echo '
                            <br id="copybr1">
                             <input style="width:390px;text-align:center" type="text" id="linkfield" value="192.168.0.137/get?id=' . $id . '" readonly><br id="copybr3">
                            <button type="button" id="copybut" onclick="copyF()">Copy link</button>
                            <span id="validfile" hidden=true style="color:green">Link copied to clipboard!</span>
                        <br id="copybr2">
                            <script>
                            function copyF() {
                              var copyText = document.getElementById("linkfield");
                              copyText.select();
                              copyText.setSelectionRange(0, 99999);
                              document.execCommand("copy");
                              copyText.hidden = true;
                              document.getElementById("copybut").hidden = true;
                              document.getElementById("copybr1").hidden = true;
                              document.getElementById("copybr2").hidden = true;
                              document.getElementById("validfile").hidden = false;
                             document.getElementById("copybr3").hidden = true;
	   	                      setTimeout(function() {document.getElementById("validfile").hidden = true}, 2000);
                            }
                            </script>';
                } else {
                    echo "<span id=\"invalidfile\" style=\"color:red\">Invalid file!</span>
	                       <script>
	   	                   setTimeout(function() {document.getElementById(\"invalidfile\").hidden = true}, 2000);
                            </script>";
                }
            }
        }

        ?>
        <br> <input id="download-submit" type="submit" name="submit"
				value="Download (POST)"> <br> <br> <input id="copy-submit"
				type="submit" name="submit" value="Get download link (GET)">
		</form>
		<br>
		<form action="admin/panel">
			<input type="submit" value="Admin Panel" />
		</form>
	</div>
</body>
</html>

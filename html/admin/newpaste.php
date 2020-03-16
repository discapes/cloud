<!DOCTYPE html>
<html>
<head>
<title>Site 58</title>
<link rel="icon" type="image/png" href="../favicon.png">
</head>
<body style="background-image: url('../lightbg.png')">
	<form action="savepaste?new=yes" method="post">

		<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo '<input type="text" placeholder="File name" name="filename" value="'.$_GET["filename"].'"required> <br><span id="invalidfile" style="color:red">File name in use</span> <br>
		      <input type="submit" value="Save">    <button type="button" onclick="window.location.href = \'newpaste\';">Refresh</button> <br>
	          <script>
	   	      setTimeout(function() {document.getElementById("invalidfile").hidden = true}, 2000);
              </script>';
        echo '<br> <input type="text" placeholder="Text" name="text" value="'.$_POST["paste"].'" required>';
} else {
    echo '<input type="text" placeholder="File name" name="filename" required> <br> <br>
		      <input type="submit" value="Save">    <button type="button" onclick="window.location.href = \'newpaste\';">Refresh</button> <br><br> <input type="text" placeholder="Text" name="text" required>';
}
?>
	</form>

</body>
</html>
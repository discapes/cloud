<!DOCTYPE html>
<html>
<head>
<title>Site 58</title>
<link rel="icon" type="image/png" href="../favicon.png">
</head>
<body style="background-image: url('../lightbg.png')">


		<?php
if (isset($_POST["paste"])) {
    $paste = $_POST["paste"];
} elseif (! ($_GET["new"] == "yes")) {
    $paste = file_get_contents("/var/www/trash/" . $_GET["filename"]);
}

if ($_GET["new"] == "yes") {
    echo '<form action="savedelpaste?new=yes" method="post">';
} else {
    echo '<form action="savedelpaste" method="post">';
}

if (isset($_GET["filename"])) {
    echo '<input type="text" placeholder="File name" name="filename" value="' . $_GET["filename"] . '" ';
    if (! ($_GET["new"] == "yes")) {
        echo 'readonly ';
    }
    echo 'required>';
} else {
    echo '<input type="text" placeholder="File name" name="filename" required>';
}
echo '<br>';

if ($_GET["invalidfile"] == "yes") {
    echo '<span id="invalidfile" style="color:red">File name in use</span>
	          <script>
	   	      setTimeout(function() {document.getElementById("invalidfile").hidden = true}, 2000);
              </script>';
}
		echo '<br><input type="submit" value="Save">      ';
		
if ($_GET["new"] == "yes") {
    echo '<button type="button" onclick="window.location.href = \'panel\';">Back</button> <br>';
} else {
    echo '<button type="button" onclick="window.location.href = \'trashlog\';">Back</button> <br>';
}

echo '<br>';
if (isset($paste)) {
    echo '<textarea type="text" style="height: 830px; width: 1900px" placeholder="Text" name="text" required>' . $paste . '</textarea>';
} else {
    echo '<textarea type="text" style="height: 830px; width: 1900px" placeholder="Text" name="text" required></textarea>';
}

?>
	</form>

</body>
</html>
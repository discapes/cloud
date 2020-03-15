<!DOCTYPE html>
<html>
<head>
<title>Files</title>
<link rel="icon" type="image/png" href="../favicon.png">
        <?php
        require '../mysql.php';
	?>
    </head>
<body style="background-image: url('../lightbg.png'); line-height: 2">
	<form action="filelog">
		<input type="submit" value="Back" />
	</form>
	<form>
		<input type="submit" value="Refresh" />
	</form>
	<br>
	    <?php
    $filelist = $conn->query("SELECT id, filename FROM Files");
    while ($row = $filelist->fetch_assoc()) {
        // $dir = "/var/www/files/";
        // $filelist = preg_grep('/^([^.])/', scandir($dir));
        // foreach ($filelist as $filename) {
        // meni niin pitkaan etten voi poistaa
        // $span = '<span style="margin:2px;background-color:white; display: inline-block; line-height: 18px; padding:3px;border-style:outset">' . $filename . '</span>';
        $button = "<button onclick=\"window.location.href = '../get?id=" . $row["id"] . "';\">" . $row["filename"] . '</button>';
        // make get request to files possible so can make shareable links that directly download files that can also be used for the files buttons to download from 'href="../get?' . $filename . '"'
        echo $button;
    }
    ?>
	</body>
</html>

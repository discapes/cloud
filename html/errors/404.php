<!DOCTYPE html>
<html>
<head>
	<title>Site 58</title>
	<link rel="icon" type="image/png" href="favicon.png">
</head>
<body style="background-image: url('lightbg.png')">
	<?php
	echo '<h1 style="margin-top:300px;text-align:center;color:red">Page not found!</h1>';
	ob_flush();
	flush();
	sleep(1);
	echo "<script>location.href='/'</script>";
	?>
</body>
</html>

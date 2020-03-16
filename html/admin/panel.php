<!DOCTYPE html>
<html>
<head>
<title>Admin Panel</title>
<link rel="icon" type="image/png" href="../favicon.png">
</head>
<body style="background-image: url('../lightbg.png')">
	<div style="margin-top: 100px" align="center">
		<form action="../home">
			<input type="submit" value="Back" />
		</form>
		<br>
		<form>
			<input type="submit" value="Refresh" />
		</form>
		<br>
		<form action="iplog">
			<input type="submit" value="IP Log" />
		</form>
		<br>
		<form action="filelog">
			<input type="submit" value="Files" />
		</form>
		<br>
		<form action="uploadhand" method="post" enctype="multipart/form-data">
			<input style="margin-left: 155px" type="file" name="upload" required>
			<br>
			<br> <input type="checkbox" name="isPaste" value="yes"> <label
				for="vehicle1">Paste?</label><br> <br> <input type="submit"
				value="Upload" name="submit">
		</form>
		<br>
		<button onclick="window.location.href='newpaste?new=yes';">New paste</button>
	</div>

</body>
</html>

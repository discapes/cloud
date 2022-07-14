<!DOCTYPE html>
<html>
<head>
<style>
a:link {
	color: green;
	background-color: transparent;
	text-decoration: none;
}

a:visited {
	color: green;
	background-color: transparent;
	text-decoration: none;
}

a:hover {
	color: green;
	background-color: transparent;
	text-decoration: underline;
}

a:active {
	color: green;
	background-color: transparent;
	text-decoration: underline;
}

table {
	font-family: arial, sans-serif;
	border-collapse: collapse;
	width: 100%;
}

td, th {
	border: 1px solid #000000;
	text-align: left;
	padding: 8px;
}

tr:nth-child(even) {
	background-color: #dddddd;
}
</style>
        <?php
        require '../mysql.php';
        ?>
        <title>IP Log</title>
<link rel="icon" type="image/png" href="../favicon.png">
</head>
<body style="background-image: url('../lightbg.png')">
	<form action="panel">
		<input type="submit" value="Back" />
	</form>
	<br>
	<form>
		<input type="submit" value="Refresh" />
	</form>
	<br>
	<form action="deliplog">
		<input type="submit" value="Deleted IPs" />
	</form>
	<br>
	<div align="center">
            <?php
            $sql = "SELECT num, ip, hostname, date FROM iplog ORDER BY num DESC";
	    $result = $conn->query($sql);
	    if ($conn->error) error_log($conn->error);
            echo "<table style=\"margin-bottom:10px;width:1px;table-layout:fixed;position: absolute;left:135px;top:10px;\"><tr><th style=\"width:30px\">Num</th><th style=\"width:150px\">IP</th><th style=\"width:300px\">Hostname</th><th style=\"width:130px\">Date</th><th style=\"width:60px\">Delete?</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["num"] . "</td><td style=\"color:green\">" . $row["ip"] . "</td><td style=\"overflow:hidden\">" . $row["hostname"] . "</td><td>" . $row["date"] . "</td><td><a style=\"color: red\" href=removeip?num=" . $row["num"] . ">DELETE</a></td></tr>";
            }
            echo "</table>";
            ?>
        </div>
</body>
</html>

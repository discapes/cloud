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
        <title>Del IP Log</title>
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
	<form action="iplog">
		<input type="submit" value="IP Log" />
	</form>
	<br>
	<div align="center">
            <?php
            $sql = "SELECT num, ip, hostname, date FROM DelIPlog ORDER BY num DESC";
            $result = $conn->query($sql);
            echo "<table style=\"width:1px;table-layout:fixed;position: absolute;left:135px;top:10px;\"><tr><th style=\"width:30px\">Num</th><th style=\"width:150px\">IP</th><th style=\"width:300px\">Hostname</th><th style=\"width:130px\">Date</th><th style=\"width:75px\">Restore?</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["num"] . "</td><td style=\"color:green\">" . $row["ip"] . "</td><td style=\"overflow:auto\">" . $row["hostname"] . "</td><td>" . $row["date"] . "</td><td><a style=\"color: blue\" href=restoreip?num=" . $row["num"] . ">RESTORE</a></td></tr>";
            }
            echo "</table>";
            ?>
        </div>
</body>
</html>

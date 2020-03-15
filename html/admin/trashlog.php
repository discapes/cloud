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
        <title>Trash Log</title>
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
	<div align="center">
            <?php
            $sql = "SELECT num, id, filename, date FROM Trash ORDER BY num desc";
            $result = $conn->query($sql);
            echo "<table style=\"width:1100px;float:left\"><tr><th style=\"width:10px\">Num</tf><th>UUID (<span style=\"color: green\">link to file</span>)</th><th>Filename</th><th style=\"width:130px\">Date</th><th style=\"width:70px\">Restore?</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["num"] . "</td><td><a href=\"gettrash?id=" . $row["id"] . "\">" . $row["id"] . "</a></td><td>" . $row["filename"] . "</td><td>" . $row["date"] . "</td><td><a style=\"color: blue\" href=restorefile?num=" . $row["num"] . ">RESTORE</a></td></tr>";
            }
            echo "</table><br><br><br>";
            ?>
        </div>
</body>
</html>

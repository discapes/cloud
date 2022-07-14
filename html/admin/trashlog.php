<!DOCTYPE html>
<html>
<head>
<style>
a:link, .green {
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
	<form action="filelog">
		<input type="submit" value="Files" />
	</form>
	<br>
	<div align="center">
            <?php
            $sql = "SELECT num, id, filename, date, isPaste FROM Trash ORDER BY num desc";
            $result = $conn->query($sql);
            echo "<table style=\"width:1px;table-layout:fixed;position: absolute;left:135px;top:10px;\"><tr><th style=\"width:30px\">Num</tf><th style=\"width:300px\">UUID (<span style=\"color: green\">link to file</span>)</th><th style=\"width:180px\">Filename (<span style=\"color: sienna\">edit as text</span>)</th><th style=\"width:130px\">Date</th><th style=\"width:75px\">Restore?</th><th style=\"width:55px\">Type</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["num"] . "</td><td><a class=\"green\" onclick=\"alert('Can\'t access deleted files in demo')\">" . $row["id"] . "</a></td><td><a style=\"color: sienna\" onclick=\"alert('Can\'t access deleted files in demo')\">" . $row["filename"] . "</a></td><td>" . $row["date"] . "</td><td><a style=\"color: blue\" href=restorefile?num=" . $row["num"] . ">RESTORE</a></td><td>";
                if ($row["isPaste"]) {
                    echo '<a href="changedeltype?num=' . $row["num"] . '&type=file" style="color:blue">TEXT</a>';

                } else {
                    echo '<a href="changedeltype?num=' . $row["num"] . '&type=paste" style="color:darkgreen">FILE</a>';
                }

                echo "</td></tr>";
            }
            echo "</table><br><br><br>";
            ?>
        </div>
</body>
</html>

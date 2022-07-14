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
        <title>File Log</title>
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
	<form action="trashlog">
		<input type="submit" value="Trash" />
	</form>
	<br>
	<form action="addmissing">
		<input type="submit" value="Add missing files" />
	</form>
	<br>
	<form action="files">
		<input type="submit" value="Files (deprecated)" />
	</form>
	<br>

	<div align="center">
            <?php
            $sql = "SELECT num, id, filename, date, isPaste FROM Files ORDER BY num desc";
            $result = $conn->query($sql);
            echo "<table style=\"width:1px;table-layout:fixed;position: absolute;left:135px;top:10px\"><tr><th style=\"width:30px\">Num</tf><th style=\"width:300px\">UUID (<span style=\"color: green\">link to file</span>)</th><th style=\"width:180px\">Filename (<span style=\"color: sienna\">edit as text</span>)</th><th style=\"width:130px\">Date</th><th style=\"width:60px\">Delete?</th><th style=\"width:55px\">Type</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["num"] . "</td><td><a href=\"../get?id=" . $row["id"] . "\">" . $row["id"] . "</a></td><td><a style=\"color: sienna\" href=\"newpaste?filename=" . $row["filename"] . "\">" . $row["filename"] . "</a></td><td>" . $row["date"] . "</td><td><a style=\"color: red\" href=removefile?num=" . $row["num"] . ">DELETE</a></td><td>";
                if ($row["isPaste"]) {
                    echo '<a href="changetype?num=' . $row["num"] . '&type=file" style="color:blue">TEXT</a>';
                } else {
                    echo '<a href="changetype?num=' . $row["num"] . '&type=paste" style="color:darkgreen">FILE</a>';
                }

                echo "</td></tr>";
            }
            echo "</table><br><br><br>";
            ?>
        </div>
</body>
</html>

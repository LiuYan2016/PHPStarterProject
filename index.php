<!DOCTYPE html>
<html>
<head>
	<title>My PHP Website</title>
</head>
<body>
	<?php
		echo "<p>Hello World!</p>";
	?>

	<a href="login.php">Click here to login</a>
	<a href="register.php">Click here to register</a>
	<br/>
	<h2 align="center">List</h2>
	<table width="100%" border="1px">
		<tr>
			<th>Id</th>
			<th>Details</th>
			<th>Post Time</th>
			<th>Edit Time</th>
		</tr>
		<?php
			mysql_connect("localhost", "root", "") or die(mysql_error());
			mysql_select_db("customers") or die ("Cannot connect to database");
			$query = mysql_query("SELECT * from list WHERE public='yes'");
			while ($row = mysql_fetch_array($query)) {
				Print "<tr>";
					Print '<td align="center">'.$row['id']."</td>";
					Print '<td align="center">'.$row['details']."</td>";
					Print '<td align="center">'.$row['date_posted']." - ".$row['time_posted']."</td>";
					Print '<td align="center">'.$row['date_edited']." - ".$row['time_edited']."</td>";
				Print "</tr>";
			}
		?>
		
	</table>
</body>
</html>
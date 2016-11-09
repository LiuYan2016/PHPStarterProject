<!DOCTYPE html>
<html>
<head>
	<title>My PHP Website</title>
</head>
<body>
	<h2>Registration Page</h2>
	<a href="index.php">Chlick here to go back</a>
	<form action="register.php" method="POST">
		Enter Username: <input type="text" name="username" required="required" /> <br/>
		Enter Password: <input type="password" name="password" required="required" /><br/>
		<input type="submit" value="Register"/>
	</form>
</body>
</html>

<?php
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$username = $_POST['username'];
		$password = $_POST['password'];

		$bool = true;

		mysql_connect("localhost", "root", "") or die(mysql_error());
		mysql_select_db("customers") or die ("Cannot connect to database");
		$query = mysql_query("SELECT * from users");
		while ($row = mysql_fetch_array($query)) {
			$table_users = $row["username"];
			echo '<script>console.log('.json_encode($table_users).');</script>';
			if($username == $table_users)
			{
				$bool = false;
				Print '<script>alert("Username has been taken!");</script>';
				Print '<script>window.location.assign("register.php");</script>';
			}
		}

		if($bool)
		{
			mysql_query("INSERT INTO users (username, password) VALUES ('$username', '$password')");
			Print '<script>alert("Successfully Registered!")</script>';
			Print '<script>window.location.assign("register.php");</script>';
		}
	}
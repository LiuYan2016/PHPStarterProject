<!DOCTYPE html>
<html>
<head>
	<title>My PHP Website</title>
</head>
<body>
	<h2>Login Page</h2>
	<a href="index.php">Chlick here to go back</a>
	<form action="checkLogin.php" method="POST">
		Enter Username: <input type="text" name="username" required="required" /> <br/>
		Enter Password: <input type="password" name="password" required="required" /><br/>
		<input type="submit" value="Login"/>
	</form>
</body>
</html>
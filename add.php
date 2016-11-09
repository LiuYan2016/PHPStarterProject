<?php
	session_start();
	if($_SESSION['user']){

	}
	else{
		header("location:index.php");
	}

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$details = $_POST["details"];
		$time = strftime("%X");
		$date = strftime("%B %d, %Y");

		Print "$time - $date - $details";
		$decision = "no";

		mysql_connect("localhost", "root", "") or die(mysql_error());
		mysql_select_db("customers") or die ("Cannot connect to database");

		foreach ($_POST['public'] as $each_check) {
			if($each_check != null){
				$decision = "yes";
			}
		}


		mysql_query("INSERT INTO list (details, date_posted, time_posted, public) VALUES ('$details', '$date', '$time', '$decision')");

		header("location: home.php");
	}
	else
	{
		header("location:home.php");
	}

?>
<?php 
	include('../config/config_appointment.php');

//session
	session_start();

	$name = "";
	$test    = "";
	$errors = array();

	if(isset($_POST['submit']))
	{
		$name = $_POST['name'];
		$test = $_POST['test'];


		if (empty($name)) { array_push($errors, "Name is required"); }

		$query = "insert into Appintment(name, test) values ('$name', '$test')";
		$result = mysqli_query($con, $query);

  		$user = mysqli_fetch_assoc($result);
	}

?>


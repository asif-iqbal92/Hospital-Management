<?php 
	include('../config/config_appointment.php');

//session
	session_start();

	$name = "";
	$date    = "";
	$time    = "";
	$errors = array();

	if(isset($_POST['submit']))
	{
		$name = $_POST['name'];
		$med = $_POST['date'];
		$doses = $_POST['time'];


		if (empty($name)) { array_push($errors, "Name is required"); }

		$query = "insert into Appointment(name, date, time) values ('$name', '$date', '$time')";
		$result = mysqli_query($con, $query);

  		$user = mysqli_fetch_assoc($result);
	}

?>


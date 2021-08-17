<?php 
	include('../config/config.php');

//session
	session_start();

	$name = "";
	$password    = "";
	$password    = "";
	$email    = "";
	$errors = array();

	if(isset($_POST['submit']))
	{
		$name = $_POST['name'];
		$gender = $_POST['gender'];
		$diagonosis = $_POST['diagonosis'];
		$email = $_POST['email'];


		if (empty($name)) { array_push($errors, "Name is required"); }
		if (empty($email)) { array_push($errors, "Email is required"); }

		$query = "insert into patient info(name, gender, diagonosis, email) values ('$name', '$gender', '$diagonosis', '$email')";
		$result = mysqli_query($con, $query);

  		$user = mysqli_fetch_assoc($result);
	}

?>


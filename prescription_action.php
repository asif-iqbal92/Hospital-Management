<?php 
	include('../config/config.php');

//session
	session_start();

	$name = "";
	$med    = "";
	$doses    = "";
	$errors = array();

	if(isset($_POST['submit']))
	{
		$name = $_POST['name'];
		$med = $_POST['gender'];
		$doses = $_POST['doses'];


		if (empty($name)) { array_push($errors, "Name is required"); }

		$query = "insert into patient info(name, med, doses) values ('$name', '$med', '$doses')";
		$result = mysqli_query($con, $query);

  		$user = mysqli_fetch_assoc($result);
	}

?>


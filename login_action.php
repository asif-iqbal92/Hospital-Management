<?php 
	include('../config/config.php');

	session_start();

	$username = "";
	$password    = "";
	$errors = array();

	if (isset($_POST['login_user']))
	{
  		$username = mysqli_real_escape_string($con, $_POST['username']);
  		$password = mysqli_real_escape_string($con, $_POST['password']);


		$cookie_username =  $_POST['username'];
		$cookie_password = $_POST['password'];
		setcookie($cookie_username, $cookie_password, time() + (86400 * 365));

  		if (empty($username))
  		{
  			array_push($errors, "Username is required");
  		}
  
  		if (empty($password))
  		{
  			array_push($errors, "Password is required");
  		}

  		if (count($errors) == 0)
  		{
  			$password = md5($password);
  			$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  			$results = mysqli_query($db, $query);
  			
  			if (mysqli_num_rows($results) == 1)
			{
  	  			$_SESSION['username'] = $username;
  	  			$_SESSION['success'] = "You are now logged in";
  	  			header('location:welcome.php');
  			}
  			else
  			{
  			array_push($errors, "Wrong username/password combination");
		  	}
  		}
	}
?>


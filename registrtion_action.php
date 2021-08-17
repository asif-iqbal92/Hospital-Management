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
		$username = $_POST['username'];
		$password = $_POST['password'];
		$email = $_POST['email'];
		$encpassword = md5($password);
		$query = "insert into user(name, username, password, email) values ('$name', '$username', '$encpassword', '$email')";
		$result = mysqli_query($con, $query);

//cookies
		$cookie_username =  $_POST['username'];
		$cookie_password = $_POST['password'];
		setcookie($cookie_username, $cookie_password, time() + (86400 * 365));

		if (empty($username)) { array_push($errors, "Username is required"); }
		if (empty($password_1)) { array_push($errors, "Password is required"); }
		if (empty($email)) { array_push($errors, "Email is required"); }

		$user_check_query = "SELECT * FROM user WHERE username='$username' OR email='$email' LIMIT 1";
  		$result = mysqli_query($con, $user_check_query);
  		$user = mysqli_fetch_assoc($result);

//checking existing username
  		if ($user)
  		{
    		if ($user['username'] === $username)
    		{
      			array_push($errors, "Username already exists");
    		}

    		if ($user['email'] === $email)
    		{
      			array_push($errors, "email already exists");
    		}
  		}



  		if (count($errors) == 0) {
				include('login.php');
				header('location:login.php');
			}
		else
			{
				echo 'Error!!!';
			}
	}

?>


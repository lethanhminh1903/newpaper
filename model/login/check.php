<?php
	session_start();

	// include object database and login
	include_once '../../controller/database.php';

	// check user input data
	if (!isset($_POST['email']) || !isset($_POST['password'])) {
	    // send the user back login page
	    header('location: ../../login.php');
	    die();
	}

	// value email and password user wrote
	$email = $_POST['email'];
	$password = $_POST['password'];

	// mysqli_real_escape_string value input
	$password = mysqli_escape_string($connect, $password);
	$email = mysqli_escape_string($connect, $email);

	
	// query check email and password
	$query = "SELECT * FROM `user` WHERE `email` = '".$email."'";
	$query_statement = mysqli_query($connect, $query);
	$data = mysqli_fetch_array($query_statement);
	$password_db = $data['password'];
	if (password_verify($password, $password_db)) {
		$record = 1;
	} else {
		$record = 0;
	}

	// check if record = 1
	if ($check_login == 1) {
		// value of user from database
		$_SESSION['id'] = $data['user_id'];
		$_SESSION['full_name'] = $data['name'];
		$_SESSION['avatar'] = $data['avatar'];

		// send the user to home
	    header('location: ../../index.php');
	    die();
	} else {
		// send the user back login page
	    header('location: ../../login.php');
	    die();
	}
?>
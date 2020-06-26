<?php
	session_start();

	// include object database and login
	include_once '../config/database.php';
	include_once '../objects/user.php';
	include_once '../config/utf8tourl.php';
	include_once 'up_avatar.php';

	// Product object
	$user = new user();
	// value input user
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$user_id = $_SESSION['id'];

	if ($name == '') {
		header('location: ../../profile.php');
		die();
	}

	// send user id input to object
	$user->user_id($user_id);

	// check up avatar
	if ($_FILES['avatar']['error'] == 0) {
		$link_avatar = up_image('avatar');
	} else {
		$query = $user->read();
		$row = mysqli_fetch_array($query);
		$link_avatar = $row['avatar'];
	}
	
	// send value input to object
	$user->name($name);
	$user->phone_number($phone);
	$user->avatar($link_avatar);

	// update user
	$user->update();
	$_SESSION['avatar'] = $link_avatar;
	$_SESSION['name'] = $name;
	header('location: ../../profile.php');
?>
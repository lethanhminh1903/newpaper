<?php
	session_start();
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");

	// include object database and login
	include_once '../config/database.php';
	include_once '../objects/login.php';

	// instantiate login object
	$login = new Login();

	// value email and password user wrote
	$json = file_get_contents('php://input');
	$data_json = json_decode($json, true);
	$email = $data_json['email'];

	// check user input data
	if ($email == "") {
		// set response code - 404 Not found
	    http_response_code(404);
	 
	    // tell the user email or password wrong
	    echo json_encode(array("code" => 404,"message" => "Not Found."));
	    die();
	}
	// mysqli_real_escape_string value input
	$email = mysqli_escape_string($login->get_connection(), $email);

	// assign user input to varialbe login object
	$login->email = $email;

	// query check email and password
	$get_info = $login->read();
	$check = mysqli_num_rows($get_info);
	if ($check == 1) {
		$data = mysqli_fetch_array($get_info);
		// get name and avatar user
		$record = [];
		$record['code'] = 200;
		$record['result']['name'] = $data['name'];
		$record['result']['avatar'] = $data['avatar'];
		echo json_encode($record);
	} else {
		// set response code - 404 Not found
	    http_response_code(404);
	 
	    // tell the user email or password wrong found
	    echo json_encode(array("code" => 404,"message" => "Not Found."));
	    die();
	}
?>
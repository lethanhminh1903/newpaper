<?php 
	include_once '../session/logged.php';
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");

	// include object database and register
	include_once '../config/database.php';
	include_once '../objects/register.php';

	//instantiate register object
	$register = new Register();


	// value email and password user wrote
	$json = file_get_contents('php://input');
	$data_json = json_decode($json, true);
	// check user input data
	if (empty($data_json['name']) || empty($data_json['email']) || empty($data_json['password']) || empty($data_json['repassword'])) {
		// set response code - 404 Not found
	    http_response_code(404);
	 
	    // tell the user email or password wrong
	    echo json_encode(array("code" => 404,"message" => "Bạn chưa điền đầy đủ thông tin!"));
	    die();
	}

	// user input data
	$name = $data_json['name'];
	$email = $data_json['email'];
	$password = $data_json['password'];
	$repassword = $data_json['repassword'];

	// check password differences
	if ($password != $repassword) {
		// set response code - 400 bad request
		http_response_code(400);

		// tell the user password differences
		echo json_encode(array("code" => 400, "message" => "Mật khẩu của bạn không khớp!"));
		die();
	}

	if (strlen($password) < 8) {
		// set response code - 400 bad request
		http_response_code(400);

		// tell the user password differences
		echo json_encode(array("code" => 400, "message" => "Mật khẩu của bạn cần dài hơn 8 ký tự!"));
		die();
	}

	// check exploitation user input data
	$name = mysqli_escape_string($register->get_connection(), $name);
	$email = mysqli_escape_string($register->get_connection(), $email);
	$password = mysqli_escape_string($register->get_connection(), $password);
	$date_created = date("Y-m-d H:i:s");
	// enscryption password
	$password = password_hash($password, PASSWORD_DEFAULT);

	// assign user input data to varialbe register object
	$register->name = $name;
	$register->email = $email;
	$register->password = $password;
	$register->date_created = $date_created;

	$check_exists = $register->check_exists();
	if ($check_exists != 0) {
		// set response code - 503 service unavailable
		http_response_code(503);

		// tell the user email or phone number exists
		echo json_encode(array("code" => 503, "message" => "Tài khoản hoặc số điện thoại đã tồn tại!"));
		die();
	}
	$check_create = $register->create();
	if ($check_create == 1) {
		// set response code - 201 created
		http_response_code(201);

		// tell the user
		echo json_encode(array("code" => 201, "message" => "Đăng ký tài khoản thành công."));
	}


?>
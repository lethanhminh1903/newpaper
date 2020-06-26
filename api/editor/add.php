<?php
	session_start();
	header('Access-Control-Allow-Origin: *');
	header('Content-Type: application/json; chartset="UTF-8"');
	date_default_timezone_set('Asia/Ho_Chi_Minh');

	// include object database and login
	include_once '../config/database.php';
	include_once '../objects/editor.php';

	// Product object
	$editor = new Editor();

	// check access admin
	$admin_id = $_SESSION['admin_id'];
	$editor->admin_id($admin_id);
	$check = $editor->check_access();
	if ($check != 0) {
		header('location: /index.php');
		die();
	}
	// value input user
	if (!@file_get_contents('php://input')) {
		// set reponse code
		http_response_code(400);

		// send data json 
		echo json_encode(array('code' => 400, 'message' => 'Lỗi (･´з`･)'));
		die();
	}

	$json = file_get_contents('php://input');
	$data_json = json_decode($json, true);
	$name = $data_json['name'];
	$email = $data_json['email'];
	$password = $data_json['password'];
	$password = password_hash($password, PASSWORD_DEFAULT);
	$avatar = "https://i.imgur.com/TEQm63Y.jpg";
	$kinds = 1;
	$date = date('Y-m-d H:i:s');

	if ($name == '' || $email == '' || $password == '') {
		// set reponse code
		http_response_code(400);

		// send data json 
		echo json_encode(array('code' => 400, 'message' => 'Lỗi (･´з`･)'));
		die();
	}

	// send value input to object
	$editor->name($name);
	$editor->email($email);
	$editor->password($password);
	$editor->avatar($avatar);
	$editor->kinds($kinds);
	$editor->created($date);


	try {
		$check = $editor->check();
		if ($check != 0) {
			// set reponse code - 400
			http_response_code(400);

			// send data json
			echo json_encode(array('code' => 400, 'message' => 'Tài khoản đã tồn tại'));
			die();
		}
		// add editor
		$editor->add();
		// set reponse code - 400
		http_response_code(200);

		// send data json 
		echo json_encode(array('code' => 200, 'message' => 'Thêm thành công'));


	} catch (Exception $e) {
		// set reponse code - 400
		http_response_code(400);

		// send data json 
		echo json_encode(array('code' => 400, 'message' => 'Lỗi (･´з`･)'));
		die();
	}
?>
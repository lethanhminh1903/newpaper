<?php
	session_start();
	header('Access-Control-Allow-Origin: *');
	header('Content-Type: application/json; chartset="UTF-8"');
	date_default_timezone_set('Asia/Ho_Chi_Minh');

	// include object database and login
	include_once '../config/database.php';
	include_once '../objects/user.php';

	// Product object
	$user = new User();
	$user_id = $_SESSION['id'];

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

	$password_old = $data_json['password_old'];
	$password_new = $data_json['password_new'];

	if ($password_old == '' || $password_new == '') {
		// set reponse code
		http_response_code(400);

		// send data json 
		echo json_encode(array('code' => 400, 'message' => 'Lỗi (･´з`･)'));
		die();
	}
	// send user id input to object
	$user->user_id($user_id);

	// get password from database
	$query = $user->read();
	$row = mysqli_fetch_array($query);
	$password_db = $row['password'];

	try {
		if (password_verify($password_old, $password_db)) {
			// hash new password
			$password_new = password_hash($password_new, PASSWORD_DEFAULT);
			$user->password($password_new);

			// update password user
			$user->update_password();
			// set reponse code - 400
			http_response_code(200);

			// send data json 
			echo json_encode(array('code' => 200, 'message' => 'Cập nhật thành công'));
			die();
		} else {
			// set reponse code - 400
			http_response_code(400);

			// send data json
			echo json_encode(array('code' => 400, 'message' => 'Mật khẩu cũ không đúng'));
			die();
		}

	} catch (Exception $e) {
		// set reponse code - 400
		http_response_code(400);

		// send data json 
		echo json_encode(array('code' => 400, 'message' => 'Lỗi (･´з`･)'));
		die();
	}
?>
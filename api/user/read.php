<?php
	session_start();
	header('Access-Control-Allow-Origin: *');
	header('Content-Type: application/json; chartset="UTF-8"');

	// include object database and login
	include_once '../config/database.php';
	include_once '../objects/user.php';

	// Product object
	$user = new User();
	$data = [];
	$user_id = $_SESSION['id'];
	$user->user_id($user_id);

	try {
		$query = $user->read();
		while ($row = mysqli_fetch_array($query)) {
			$data['result']['id'] = $row['user_id'];
			$data['result']['name'] = $row['name'];
			$data['result']['phone'] = $row['phone_number'];
			$data['result']['email'] = $row['email'];
			$data['result']['avatar'] = $row['avatar'];
		}
		// set reponse code - 200 OK
		http_response_code(200);
		// send data json 
		echo json_encode($data);

	} catch (Exception $e) {
		// set reponse code - 400
		http_response_code(400);

		// send data json 
		echo json_encode(array('code' => 400, 'message' => 'Lỗi (･´з`･)'));
		die();
	}
?>
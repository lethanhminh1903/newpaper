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
	$data = [];
	
	// check access admin
	$admin_id = $_SESSION['admin_id'];
	$editor->admin_id($admin_id);
	$check = $editor->check_access();
	if ($check != 0) {
		header('location: /index.php');
		die();
	}

	try {
		$query = $editor->read();
		$i = 0;
		while ($row = mysqli_fetch_array($query)) {
			$data['result'][$i]['id'] = $row['admin_id'];
			$data['result'][$i]['name'] = $row['name'];
			$data['result'][$i]['email'] = $row['email'];
			$data['result'][$i]['avatar'] = $row['avatar'];
			$i++;
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
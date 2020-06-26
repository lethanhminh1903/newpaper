<?php
	session_start();
	header('Access-Control-Allow-Origin: *');
	header('Content-Type: application/json; chartset="UTF-8"');
	date_default_timezone_set('Asia/Ho_Chi_Minh');

	// include object database and login
	include_once '../config/database.php';
	include_once '../objects/like.php';

	// Product object
	$like = new like();

	// value input user
	if (!@file_get_contents('php://input') || !@$_SESSION['id']) {
		// set reponse code
		http_response_code(400);

		// send data json 
		echo json_encode(array('code' => 400, 'message' => 'Lỗi (･´з`･)'));
		die();
	}

	$json = file_get_contents('php://input');
	$data_json = json_decode($json, true);
	$user_id = $_SESSION['id'];
	$post_id = $data_json['id'];
	$date = date('Y-m-d H:i:s');
	if ($post_id == '') {
		// set reponse code
		http_response_code(400);

		// send data json 
		echo json_encode(array('code' => 400, 'message' => 'Lỗi (･´з`･)'));
		die();
	}

	// send value input to object
	$like->user_id($user_id);
	$like->post_id($post_id);
	$like->created($date);


	try {
		// check before like
		$check = $like->check();
		if ($check == 0) {
			// add like
			$like->add();
			$total = $like->total();
			// set reponse code - 400
			http_response_code(200);

			// send data json 
			echo json_encode(array('code' => 200, 'message' => 'liked', 'like_total' => $total));
		} else {
			// delete like
			$like->delete();
			$total = $like->total();
			// set reponse code - 400
			http_response_code(200);

			// send data json 
			echo json_encode(array('code' => 200, 'message' => 'unlike', 'like_total' => $total));
		}

	} catch (Exception $e) {
		// set reponse code - 400
		http_response_code(400);

		// send data json 
		echo json_encode(array('code' => 400, 'message' => 'Lỗi (･´з`･)'));
		die();
	}
?>
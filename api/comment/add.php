<?php
	session_start();
	header('Access-Control-Allow-Origin: *');
	header('Content-Type: application/json; chartset="UTF-8"');
	date_default_timezone_set('Asia/Ho_Chi_Minh');

	// include object database and login
	include_once '../config/database.php';
	include_once '../objects/comment.php';

	// Product object
	$comment = new Comment();

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
	$user_id = $_SESSION['id'];
	$content = $data_json['content'];
	$post_id = $data_json['id'];
	$date = date('Y-m-d H:i:s');
	if ($post_id == '' || $content == '') {
		// set reponse code
		http_response_code(400);

		// send data json 
		echo json_encode(array('code' => 400, 'message' => 'Lỗi (･´з`･)'));
		die();
	}

	// send value input to object
	$comment->user_id($user_id);
	$comment->content($content);
	$comment->post_id($post_id);
	$comment->created($date);


	try {
		// add comment
		$comment->add();
		// set reponse code - 400
		http_response_code(200);

		// send data json 
		echo json_encode(array('code' => 200, 'message' => 'commented'));

	} catch (Exception $e) {
		// set reponse code - 400
		http_response_code(400);

		// send data json 
		echo json_encode(array('code' => 400, 'message' => 'Lỗi (･´з`･)'));
		die();
	}
?>
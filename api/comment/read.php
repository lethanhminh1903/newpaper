<?php
	header('Access-Control-Allow-Origin: *');
	header('Content-Type: application/json; chartset="UTF-8"');

	// include object database and login
	include_once '../config/database.php';
	include_once '../objects/comment.php';
	include_once '../config/time.php';
	
	// dashboard login object
	$comment = new Comment();
	$data = [];


	// data user send request
	if (!@file_get_contents('php://input')) {
		// set reponse code - 200 OK
		http_response_code(400);

		// send data json 
		echo json_encode(array('code' => 400, 'message' => 'Lỗi (･´з`･)'));
		die();
	}
	$json = file_get_contents('php://input');
	$data_json = json_decode($json, true);
	if (trim($data_json['id']) != '') {
		$id = $data_json['id'];
	} else {
		// set reponse code - 404
		http_response_code(400);
		// send data json 
		echo json_encode(array('code' => 400, 'message' => 'Lỗi (･´з`･)'));
		die();
	}

	$comment->post_id($id);

	$query = $comment->read();
	$i = 0;
	while ($row = mysqli_fetch_array($query)) {
		$data['result'][$i]['id'] = $row['comment_id'];
		$data['result'][$i]['content'] = $row['content'];
		$data['result'][$i]['name'] = $row['name'];
		$data['result'][$i]['avatar'] = $row['avatar'];
		$data['result'][$i]['created'] = time_stamp($row['created']);
		$i++;
	}
	// set reponse code - 200 OK
	http_response_code(200);
	// send data json 
	echo json_encode($data);
?>
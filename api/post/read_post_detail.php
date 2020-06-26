<?php
	header('Access-Control-Allow-Origin: *');
	header('Content-Type: application/json; chartset="UTF-8"');

	// include object database and login
	include_once '../config/database.php';
	include_once '../config/time.php';
	include_once '../config/utf8tourl.php';
	include_once '../objects/post.php';
	
	// dashboard login object
	$post = new Post();
	$data = [];
	// data user send request
	if (!@file_get_contents('php://input')) {
		// set reponse code - 200 OK
		http_response_code(400);

		// send data json 
		echo json_encode(array('code' => 400, 'message' => 'Lỗi không thể truy cập'));
		die();
	}
	$json = file_get_contents('php://input');
	$data_json = json_decode($json, true);
	if (trim($data_json['id']) != '' || trim($data_json['title']) != '') {
		$id = $data_json['id'];
		$title = $data_json['title'];
	} else {
		// set reponse code - 404
		http_response_code(400);
		// send data json 
		echo json_encode(array('code' => 400, 'message' => 'Lỗi không thể truy cập'));
		die();
	}
	$post->post_id($id);
	$row = $post->get_post_detail();
	$title_db = utf8tourl($row['title']);
	if ($title != $title_db) {
		// set reponse code - 404
		http_response_code(400);
		// send data json 
		echo json_encode(array('code' => 400, 'message' => 'Lỗi không thể truy cập'));
		die();
	}
	$data['result']['id'] = $row['post_id'];
	$data['result']['title'] = $row['title'];
	$data['result']['name'] = $row['name'];
	$data['result']['avatar'] = $row['avatar'];
	$data['result']['detail_description'] = $row['detail_description'];
	$data['result']['image'] = $row['image'];
	$data['result']['created'] = time_stamp($row['created_post']);
	$data['result']['link_post'] = utf8tourl($row['title'])."-".$row['post_id'].".html";
	// set reponse code - 200 OK
	http_response_code(200);
	// send data json 
	echo json_encode($data);
?>
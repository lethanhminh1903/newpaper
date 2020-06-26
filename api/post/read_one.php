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

	$row = $post->get_post_new();
	$data['result']['id'] = $row['post_id'];
	$data['result']['title'] = $row['title'];
	$data['result']['description'] = $row['description'];
	$data['result']['image'] = $row['image'];
	$data['result']['created'] = time_stamp($row['created']);
	$data['result']['link_post'] = utf8tourl($row['title'])."-".$row['post_id'].".html";
	// set reponse code - 200 OK
	http_response_code(200);
	// send data json 
	echo json_encode($data);
?>
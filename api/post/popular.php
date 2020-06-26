<?php
	header('Access-Control-Allow-Origin: *');
	header('Content-Type: application/json; chartset="UTF-8"');

	// include object database and post
	include_once '../config/database.php';
	include_once '../config/utf8tourl.php';
	include_once '../objects/post.php';
	
	// dashboard post object
	$post = new Post();
	$data = [];

	$query = $post->get_post_popular();
	$i = 0;
	while ($row = mysqli_fetch_array($query)) {
		$data['result'][$i]['id'] = $row['post_id'];
		$data['result'][$i]['title'] = $row['title'];
		$data['result'][$i]['total_like'] = $row['total'];
		$data['result'][$i]['link_post'] = utf8tourl($row['title'])."-".$row['post_id'].".html";
		$i++;
	}
	// set reponse code - 200 OK
	http_response_code(200);
	// send data json 
	echo json_encode($data);
?>
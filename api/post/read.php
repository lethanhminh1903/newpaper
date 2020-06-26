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

	$query = $post->get_post();
	$i = 0;
	while ($row = mysqli_fetch_array($query)) {
		$data['result'][$i]['id'] = $row['post_id'];
		$data['result'][$i]['name'] = $row['name'];
		$data['result'][$i]['avatar'] = $row['avatar'];
		$data['result'][$i]['title'] = $row['title'];
		$data['result'][$i]['description'] = $row['description'];
		$data['result'][$i]['image'] = $row['image'];
		$data['result'][$i]['created'] = time_stamp($row['created_post']);
		$data['result'][$i]['link_post'] = utf8tourl($row['title'])."-".$row['post_id'].".html";
		$i++;
	}
	// set reponse code - 200 OK
	http_response_code(200);
	// send data json 
	echo json_encode($data);
?>
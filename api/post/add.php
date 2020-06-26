<?php
	header('Access-Control-Allow-Origin: *');
	header('Content-Type: application/json; chartset="UTF-8"');
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	// include object database and login
	include_once '../session/login-admin.php';
	include_once '../config/database.php';
	include_once '../objects/post.php';
	include_once 'up_img.php';
	include_once '../config/utf8tourl.php';
	include_once '../config/simple_html_dom.php';

	// post object
	$post = new Post();
	$json = file_get_contents('php://input');
	$data_json = json_decode($json, true);
	$url = $data_json['url'];
	error_reporting(0);
	$urll = parse_url($url);
	$host = $urll['host'];
	if ($host == 'dantri.com.vn') {
	    $html = file_get_html($url);
	    $title = $html->find("meta[name=twitter:title]", 0)->content;
	    $image = $html->find("meta[name=twitter:image]",0)->content;
	    $description = $html->find("meta[name=twitter:description]",0)->content;
	    $time = $html->find("span[class=fr fon7 mr2 tt-capitalize]",0)->innertext;
	    $detail_description = $html->find("div[id=divNewsContent]" ,0)->innertext;
	    $figcaption_array = [];
	    for ($i = 0; $i < 10; $i++) { 
	        $figcaption = $html->find("figcaption" ,$i)->innertext;
	        if ($figcaption != null) {
	            $figcaption_array[] = $figcaption;
	        }
	    }
	    $tag = $html->find("div[class=news-tag]" ,0)->innertext;
	    $author = $html->find("p[style=text-align:right]" ,0)->innertext;
	    $title = str_replace('\\','',$title);
	    $detail_description = str_replace(array($tag,$author),'',$detail_description);
	    $detail_description = str_replace($figcaption_array,'',$detail_description);
	    $description = str_replace(array("(Dân trí) - "),'',$description);
	    $title = str_replace(array('"',"'","&quot;"),'',$title);
	    // $detail_description = trim(htmlentities($detail_description));

	}
	// input user
	$admin_id = $_SESSION['admin_id'];
	$date = date('Y-m-d H:i:s');

	// add value input to obj
	$post->admin_id($admin_id);
	$post->image($image);
	$post->title($title);
	$post->description($description);
	$post->detail_description(trim($detail_description));
	$post->admin_id($admin_id);
	$post->category($category);
	$post->created($date);

	// add post
	$post->add();

	// check up avatar
	// if ($_FILES['image1']['error'] == 0) {
	// 	$link_avatar = up_image('image1', $name_post, "1");
	// 	$post->link_image($link_avatar);
	// 	$post->add_images();
	// }
	http_response_code(200);
	echo json_encode(array('code' => 200));
?>
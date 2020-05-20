<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>tất cả bài viết</title>
	<link rel="stylesheet" href="">
	<style>
	.khung {
	    width: 350px;
	    height: 400px;
	    box-shadow: 0.4px 0.4px 4px 0.4px #000;
	    border-radius: 10px;
	    margin: 0px 10px;
	    float: left;
	}

	img {
	    width: 350px;
	    height: 258px;
	}
	</style>
</head>
<body>
	<?php
	include 'database.php';
	include 'edit-title.php';
	$query = "select * from `bai_viet`";
		$result= mysqli_query($connect, $query);
		while ($row= mysqli_fetch_array($result)) {
			$mo_ta = substr($row['mo_ta'],0,65);
			echo "<div class='khung'>
				<a href='bai-viet-".utf8tourl($row['ten'])."-{$row['id']}.html'>
					<img src='{$row['anh']}'>
				</a>
				<a href='bai-viet-".utf8tourl($row['ten'])."-{$row['id']}.html'>
					<h3>{$row['ten']}</h3>
				</a>
				<p>{$mo_ta}</p>
			</div>";
		}
		
	?>
	
</body>
</html>
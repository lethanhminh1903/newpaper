<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>list product</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<?php
	include_once("connect.php");
	$sql = @mysql_query("SELECT * FROM book"); 
	?>
	<div style="width:840px;background:#6CF;
	border: orange thick double;">
	<?php 
	while($row = mysql_fetch_array($sql))
	{
		$id = $row['id'];
		$title = $row['title'];
		$price = $row['price'];
		$author = $row['author'];
		$publisher = $row['publisher'];
	 ?>
	<div style="width: 198px; height: 300px;
	 border: medium #F60 dotted; float: left; background: #FFF">
	 	<img src="images/sanpham/<?php echo $row['image']; ?>" width="198" height="150px" />
	 	<p>Title: <?php echo $title; ?></p>
	 	<p>Price: <?php echo $price; ?></p>
	 	<p>Author: <?php echo $author; ?></p>
	 	<p>Publisher: <?php echo $publisher ?></p>

	 	<?php
	 	} 
	 	 ?>
	 	
	</div>
</body>
</html>
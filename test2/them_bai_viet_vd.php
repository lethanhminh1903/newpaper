<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Thêm bài viết</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<form method="POST">
		<input type="text" name="name"><br>
		<input type="text" name="anh"><br>
		<textarea name="mota"></textarea><br>
		<button type='submit' name="oki">thêm</button>
	</form>
</body>
</html>
<?php
if (isset($_POST['oki'])) {
	include 'database.php';
	$name = $_POST['name'];
	$anh = $_POST['anh'];
	$mo_ta = $_POST['mota'];
	$query = "INSERT INTO `bai_viet`(`ten`, `anh`, `mo_ta`) VALUES ('{$name}','{$anh}','{$mo_ta}')";
	mysqli_query($connect, $query);
}
?>
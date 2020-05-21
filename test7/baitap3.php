<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Bài Tập 3</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<form method="POST">
	<input type="number" name="a" placeholder="Nhập số a">
	<input type="numbet" name="b" placeholder="Nhập số b">
	<button type="submit" name="oki">oki</button>
	</form>
</body>
</html>
<?php
if (isset($_POST['oki'])) {
	$a = $_POST['a'];
	$b = $_POST['b'];
	$result = $a+$b;
	echo 'Kết quà là'.$result;
  } 
 ?>
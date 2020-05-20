<?php
	include 'database.php';
	if (!isset($_GET['id']) || trim($_GET['id']) == "") {
		header('location: bai_viet_vd.php');
	}
	$id= $_GET['id'];
	$query= "select * from bai_viet where id=$id";
	$check= mysqli_num_rows(mysqli_query($connect, $query));
	if ($check == 0) {
		header('location: bai_viet_vd.php');
	}
	$data= mysqli_query($connect,$query)->fetch_array();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $data['ten'] ?></title>
	<link rel="stylesheet" href="">
</head>
<body>
	<h1><?php echo $data['ten'] ?></h1>
	<img src="<?php echo $data['anh'] ?>">
	<p><?php echo $data['mo_ta'] ?></p>
</body>
</html>
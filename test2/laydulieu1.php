<?php
	if (isset($_POST['oki'])) {
		$key=$_POST['username'];
		include 'database.php';
		$query = "select * from `admin` where username = '{$key}'";
		$result= mysqli_query($connect, $query);
		while ($row= mysqli_fetch_array($result)) {
			echo "Mật khẩu của bạn là:" . $row['password'];
		}
	 }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>lấy lại mật khẩu</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<form method="post">
		<input type="text" name='username'> <br>
		<button type="submit" name='oki'>ok</button>

	</form>
</body>
</html>
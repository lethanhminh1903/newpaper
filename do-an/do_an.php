<?php 
	$host= "localhost";
	$username= "root";
	$password= "";
	$tale_name= "tintuc";
	// thực hiện kết nối database
	$connect= mysqli_connect($host,$username,$password,$tale_name) or die('Lỗi');
	// câu truy vấn sqli
	$query = "insert into admin (username,password) value ('leminh1201','123456')";
	// thực hiện truy vấn
	mysqli_query($connect, $query);
?>
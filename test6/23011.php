<?php
$diem=100;
if ($diem <0 && $diem >100) {
	echo 'khong hop le';
}
elseif ($diem >=80 && $diem <=100) {
 	echo 'gioi';
 } 
 elseif ($diem >=70 && $diem <=79) {
 	echo 'kha';
 }
 elseif ($diem >=60 && $diem <=69) {
 	echo 'TB kha'; 	
 }
 elseif ($diem >=50 && $diem<=59) {
 	echo 'TB';
 }
 elseif ($diem  <=50) {
 	echo 'yeu';
 }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
	
</body>
</html>
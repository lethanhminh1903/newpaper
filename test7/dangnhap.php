<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iofrm</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="css/iofrm-style.css">
    <link rel="stylesheet" type="text/css" href="css/iofrm-theme2.css">
</head>
<body>
    <div class="form-body">
        <div class="website-logo">
            <a href="index.html">
                <div class="logo">
                    <img class="logo-size" src="images/logo-light.svg" alt="">
                </div>
            </a>
        </div>
        <div class="row">
            <div class="img-holder">
                <div class="bg"></div>
                <div class="info-holder">

                </div>
            </div>
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Get more things done with Loggin platform.</h3>
                        <p>Access to the most powerfull tool in the entire design and web industry.</p>
                        <div class="page-links">
                            <a href="login2.html" class="active">Login</a><a href="register2.html">Register</a>
                        </div>
                        <form>
                            <input class="form-control" type="text" name="username" placeholder="E-mail Address" required>
                            <input class="form-control" type="password" name="password" placeholder="Password" required>
                            <input type="checkbox" id="chk1"><label for="chk1">Remmeber me</label>
                            <div class="form-button">
                                <button id="submit" type="submit" class="ibtn">Login</button> <a href="forget2.html">Forget password?</a>
                            </div>
                        </form>
                        <div class="other-links">
                            <span>Or login with</span><a href="#">Facebook</a><a href="#">Google</a><a href="#">Linkedin</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>
<?php 
    $host= "localhost";
    $username= "root";
    $password= "";
    $tale_name= "test12";
    // thực hiện kết nối database
    $connect= mysqli_connect($host,$username,$password,$tale_name) or die('Lỗi');
    // câu truy vấn sqli
    $query = "SELECT * FROM `admin` where username='leminh'  and password= '123456' ";
    // thực hiện truy vấn
    $select = mysqli_query($connect, $query);

    while ($BN = mysqli_fetch_array($select)) {
        $check=$BN['id'];
    }
    if (isset($check)) {
        echo 'Bạn đã đăng nhập thành công';
    } else {
        echo 'Bạn đã đăng nhập thất bại';
    }

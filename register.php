<?php
    include_once 'api/session/logged.php';
    include_once 'views/component/head.php';
?>
<!DOCTYPE html>
<html>

<head>
    <?php head('Đăng ký | Gud News'); ?>
</head>

<body style="overflow: hidden; background: #172b4d">
    <div class="navbar-account">
        <img src="views/assets/image/logo-white.png" width="150" alt="logo">
    </div>
    <div class="container-account">
        <div class="bg-top"></div>
        <h1 id="status">ĐĂNG KÝ</h1>
    </div>
    <div class="login register">
        <form method="post">
        	<div class="input-login input-register">
        		<i class="gg-user faa-pulse animated"></i><input id="name" type="text" placeholder="Họ tên">
        	</div>
            <div class="input-login input-register">
                <i class="gg-mail faa-pulse animated"></i><input id="email" onchange="check_email()" type="email" placeholder="Email">
            </div>
            <div class="input-login input-register">
                <i class="gg-lock faa-pulse animated"></i><input id="password" onkeyup="check_pass()" type="password" placeholder="Mật khẩu">
            </div>
            <div class="input-login input-register">
                <i class="gg-lock faa-pulse animated"></i><input id="repassword" onkeyup="check_repass()" type="password" placeholder="Nhập lại mật khẩu">
            </div>
            <button type="button" id="register">Tiếp tục</button>
            <div class="footer-login">
            	<a href="login.php">Bạn đã có tài khoản?</a>
            </div>
        </form>
    </div>
    <script>
        var register = document.getElementById('register');
        var email = document.getElementById('email').value;
        
        

        function check_pass() {
            var password = document.getElementById('password').value;
            var status = document.getElementById('status');
            if (password.length < 6) {
                status.innerHTML = 'Mật khẩu phải dài hơn 6 ký tự';
                return false;
            } else {
                status.innerHTML = "ĐĂNG KÝ";
                return true;
            }
        }

        function check_repass() {
            var password = document.getElementById('password').value;
            var repassword = document.getElementById('repassword').value;
            var status = document.getElementById('status');
            if (password != repassword) {
                status.innerHTML = 'Mật khẩu chưa khớp';
                return false;
            } else {
                status.innerHTML = "ĐĂNG KÝ";
                return true;
            }
        }

        function check_email() {
            var email = document.getElementById('email').value;
            var status = document.getElementById('status');
            const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            if (re.test(email) == false) {
                status.innerHTML = 'Email không hợp lệ';
                return false;
            } else {
                status.innerHTML = "ĐĂNG KÝ";
                return true;
            }
        }

        register.addEventListener('click',()=>{
            var email = document.getElementById('email').value;
            var name = document.getElementById('name').value;
            var password = document.getElementById('password').value;
            var repassword = document.getElementById('repassword').value;
            if (check_pass()) {
                if (check_repass()) {
                    if (check_email()) {
                        fetch('api/register/create.php', {
                            method: 'POST',
                            headers: {
                            'Content-Type': 'application/json',
                            },
                            body: JSON.stringify({name: name, email: email, password: password, repassword: repassword}),
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.code == 404) {
                                return;
                            }
                            setTimeout(()=>{
                                window.location = 'index.php';
                            },1000)
                        })
                    }
                }
            }
        })
    </script>
</body>

</html>
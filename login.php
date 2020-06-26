<?php
    include_once 'api/session/logged.php';
    include_once 'views/component/head.php';
?>
<!DOCTYPE html>
<html>

<head>
    <?php head('Đăng nhập | Gud News'); ?>
</head>

<body style="overflow: hidden; background: #172b4d">
    <div class="navbar-account">
        <a href="index.php">
            <img src="views/assets/image/logo-white.png" width="150" alt="logo">
        </a>
    </div>
    <div class="container-account">
        <div class="bg-top"></div>
        <h1 id="status">ĐĂNG NHẬP</h1>
    </div>
    <div class="login" id="login-layout">
        <div id="avatar" class="avatar-login" style="display: none"></div>
        <h3 id="name" style="display: none"></h3>
        <form method="post">
            <div id="pass-layout" class="input-login" style="display: none">
                <i class="gg-lock faa-pulse animated"></i><input id="password" type="password" placeholder="Mật khẩu">
            </div>
        	<div id="email-layout" class="input-login">
        		<i class="gg-mail faa-pulse animated"></i><input id="email" type="email" placeholder="Email">
        	</div>
            <button type="button" id="login-step1">Tiếp tục</button>
            <button type="button" id="login-step2" style="display: none">Đăng nhập</button>
            <div class="footer-login">
            	<a href="register.php" id="no-account">Bạn chưa có tài khoản?</a>
            	<a href="#" id="forgot">Quên mật khẩu?</a>
            </div>
        </form>
    </div>
    <script>
        var login_step1 = document.getElementById('login-step1');
        var login_step2 = document.getElementById('login-step2');
        login_step1.addEventListener('click',()=>{
            var email = document.getElementById('email').value;
            fetch('api/login/read.php', {
                method: 'POST', 
                headers: {
                'Content-Type': 'application/json',
                },
                body: JSON.stringify({email: email}),
            })
            .then(response => response.json())
            .then(data => {
                var status = document.getElementById('status');
                if (data.code == 400) {
                    status.innerHTML = data.message;
                    return false;
                }
                status.innerHTML = "ĐĂNG NHẬP";
                var login_layout = document.getElementById('login-layout'),
                pass_layout = document.getElementById('pass-layout'),
                login_step1 = document.getElementById('login-step1'),
                login_step2 = document.getElementById('login-step2'),
                email_layout = document.getElementById('email-layout'),
                no_account = document.getElementById('no-account'),
                forgot = document.getElementById('forgot'),
                avatar = document.getElementById('avatar'),
                name = document.getElementById('name');

                login_layout.classList.add('step2');
                avatar.setAttribute('style','background:#fff8 url('+data.result.avatar+') center center / cover;');
                name.setAttribute('style','');
                pass_layout.setAttribute('style','');
                login_step2.setAttribute('style','');
                email_layout.setAttribute('style','display: none');
                name.innerHTML = data.result.name;
                no_account.remove();
                login_step1.remove();
                forgot.remove();
            })
            .catch((error) => {
              console.error('Error:', error);
            });
        });

        login_step2.addEventListener('click',()=>{
            var email = document.getElementById('email').value;
            var password = document.getElementById('password').value;
            fetch('api/login/check.php', {
                method: 'POST',
                headers: {
                'Content-Type': 'application/json',
                },
                body: JSON.stringify({email: email, password: password}),
            })
            .then(response => response.json())
            .then(data => {
                var status = document.getElementById('status');
                if (data.code == 404) {
                    status.innerHTML = data.message;
                    return false;
                } else {
                    window.location = 'index.php';
                }
                
            })
        })
    </script>
</body>

</html>
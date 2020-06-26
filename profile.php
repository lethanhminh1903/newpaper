<?php
    session_start();
    if (!@$_SESSION['id']) {
        header('location: login.php');
    }
    include_once 'views/component/head.php';
?>
<!DOCTYPE html>
<html>

<head>
    <?php head('Quản lý biên tập viên | Gud News'); ?>
</head>

<body>
    <div class="container">
        <?php include_once 'views/component/sidebar.php'; ?>
        <div class="row">
            <?php include_once 'views/component/navbar.php'; ?>
            <div class="post-detail">
                <div class="main-post" style="margin: 0; height: 250px;">
                    <form action="api/user/update.php" method="post" enctype="multipart/form-data">
                        <h3>Thông tin cá nhân</h3>
                        <div class="avatar-profile">
                            <label for="avt">
                                <div class="avatar-detail" id="avt-review" style="background: url( <?php echo $_SESSION['avatar']; ?> ) center center / cover;">
                                    <div class="bg-avatar" style="display: none;">
                                        Thay đổi
                                    </div>
                                </div>
                                <input type="file" name="avatar" id="avt">
                            </label>
                        </div>
                        <div class="info-profile">
                            <div class="add-editor">
                                <input type="text" name="name" id="name" placeholder="Họ tên">
                                <input type="text" name="phone" id="phone" placeholder="Số điện thoại" maxlength="10">
                                <input type="email" id="email" placeholder="Email" disabled="">
                                <button class="button-custom" type="submit">Lưu thay đổi</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="main-post" style="margin: 60px 0px">
                    <h3>Đổi mật khẩu</h3>
                    <div class="add-editor">
                        <input type="text" id="pass_old" placeholder="Mật khẩu cũ">
                        <input type="password" id="pass_new" placeholder="Mật khẩu mới">
                        <input type="password" id="re_pass" placeholder="Nhập lại mật khẩu">
                        <button class="button-custom" id="submit">Đổi mật khẩu</button>
                    </div>
                </div>
            </div>
            
            <?php include_once 'views/component/footer.php'; ?>
        </div>
    </div>
    <script>
        document.getElementById('avt').addEventListener('change', handleFileSelect, false);
        function handleFileSelect(evt) {
            var files = evt.target.files; // FileList object
            // Loop through the FileList and render image files as thumbnails.
            for (var i = 0, f; f = files[i]; i++) {
                // Only process image files.
                if (!f.type.match('image.*')) {
                    continue;
                }
                var reader = new FileReader();
                reader.onload = (function (theFile) {
                    return function (e) {
                        document.getElementById('avt-review').setAttribute('style','background: url('+e.target.result+') center center / cover');
                    };
            })(f);
            // Read in the image file as a data URL.
            reader.readAsDataURL(f);
            }
        }

        // read user
        fetch('api/user/read.php', {
          method: 'POST', 
          headers: {
            'Content-Type': 'application/json',
          }
        })
        .then(response => response.json())
        .then(data => {
            var name = document.getElementById('name'),
            phone = document.getElementById('phone'),
            email = document.getElementById('email');
            
            name.value = data.result.name;
            phone.value = data.result.phone;
            email.value = data.result.email;
        })
        .catch((error) => {
          console.error('Error:', error);
        });

        var submit = document.getElementById('submit');
        submit.addEventListener('click',()=>{
            var pass_old = document.getElementById('pass_old').value,
            pass_new = document.getElementById('pass_new').value,
            re_pass = document.getElementById('re_pass').value;

            if (pass_new != re_pass) {
                return false;
            }
            data = {password_old: pass_old, password_new: pass_new};
            // add post user
            fetch('api/user/update_password.php', {
                method: 'POST', 
                headers: {
                'Content-Type': 'application/json',
                },
                body: JSON.stringify(data),
            })
            .then(response => response.json())
            .then(data => {
                document.getElementById('pass_old').value = '';
                document.getElementById('pass_new').value = '';
                document.getElementById('re_pass').value = '';
            })
            .catch((error) => {
                console.error('Error:', error);
            });
        })
    </script>
</body>

</html>
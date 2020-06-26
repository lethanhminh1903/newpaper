<?php
    session_start();
    if (!@$_SESSION['admin_id']) {
        header('location: login.php');
    }
    include_once 'component/head.php';
    include_once '../api/editor/check.php';
?>
<!DOCTYPE html>
<html>

<head>
    <?php head('Quản lý biên tập viên | Gud News'); ?>
</head>

<body>
    <div class="container">
        <?php include_once 'component/sidebar.php'; ?>
        <div class="row">
            <?php include_once 'component/navbar.php'; ?>
            <div class="post-detail">
                <div class="main-post" style="margin: 0">
                    <h3>Thêm biên tập viên</h3>
                    <div class="add-editor">
                        <input type="text" id="name" placeholder="Họ tên">
                        <input type="email" id="email" placeholder="Email">
                        <input type="password" id="password" placeholder="Mật khẩu">
                        <button class="button-custom" id="submit">Xác nhận</button>
                    </div>
                    <h3>Danh sách biên tập viên</h3>
                    <table id="editor"></table>
                </div>
            </div>
            
            <?php include_once '../views/component/footer.php'; ?>
        </div>
    </div>
    <script>
        var submit = document.getElementById('submit');
        submit.addEventListener('click', () => {
            var name = document.getElementById('name').value,
            email = document.getElementById('email').value,
            password = document.getElementById('password').value;

            data = {name: name, email: email, password: password};
            // add post user
            fetch('../api/editor/add.php', {
                method: 'POST', 
                headers: {
                'Content-Type': 'application/json',
                },
                body: JSON.stringify(data),
            })
            .then(response => response.json())
            .then(data => {
                document.getElementById('name').value = '';
                document.getElementById('email').value = '';
                document.getElementById('password').value = '';
                get_list_editor();
            })
            .catch((error) => {
              console.error('Error:', error);
            });
        })

        function get_list_editor() {
            fetch('../api/editor/read.php', {
                method: 'POST', 
                headers: {
                'Content-Type': 'application/json',
                }
            })
            .then(response => response.json())
            .then(data => {
                var editor = document.getElementById('editor');
                editor.innerHTML = '';
                editor.insertAdjacentHTML('beforeend',"<tr id='title'><th>Họ tên</th><th>Email</th><th id='like'>Tuỳ chọn</th></tr>");
                for (a of data.result) {
                    editor.insertAdjacentHTML('beforeend',"<tr><td>"+a.name+"</td><td>"+a.email+"</td><td><button class='button-delete'>xoá</button></td></tr>");
                }
            })
            .catch((error) => {
              console.error('Error:', error);
            });
        }
        get_list_editor();
        document.getElementById('editor-sidebar').classList.add('active');
    </script>
</body>

</html>
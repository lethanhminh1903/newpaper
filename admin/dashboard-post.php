<?php
    session_start();
    if (!@$_SESSION['admin_id']) {
        header('location: login.php');
    }
    include_once 'component/head.php';
?>
<!DOCTYPE html>
<html>

<head>
    <?php head('Bảng quản trị | Gud News'); ?>
</head>

<body>
    <div class="container">
        <?php include_once 'component/sidebar.php'; ?>
        <div class="row">
            <?php include_once 'component/navbar.php'; ?>
            <div class="post-detail">
                <div class="main-post" style="margin: 0">
                    <button class="button-custom">Thêm bài viết</button>
                    <h3>Các bài báo mới nhất của Dân Trí</h3>
                    <?php include_once 'model/newspaper/dan-tri.php'; ?>
                </div>
            </div>
            
            <?php include_once '../views/component/footer.php'; ?>
        </div>
    </div>
    <script>
        var dom = document.getElementsByClassName('hihi');
        for (a of dom) {
            get_link(a);
        }

        function get_link(a) {
            a.addEventListener('click', ()=>{
                add_post(a.getAttribute('data-link'));
                return false;
            })
        }

        function add_post(link) {
            data = {url: link};
            // add post user
            fetch('../api/post/add.php', {
              method: 'POST', 
              headers: {
                'Content-Type': 'application/json',
              },
              body: JSON.stringify(data),
            })
            .then(response => response.json())
            .then(data => {
                console.log('done');
            })
            .catch((error) => {
              console.error('Error:', error);
            });
        }
        document.getElementById('post-sidebar').classList.add('active');
    </script>
</body>

</html>
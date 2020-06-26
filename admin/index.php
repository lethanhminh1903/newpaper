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
                    <h3>Thống kê</h3>
                    
                </div>
            </div>
            
            <?php include_once '../views/component/footer.php'; ?>
        </div>
    </div>
    <script>
        document.getElementById('home-sidebar').classList.add('active');
    </script>
</body>

</html>
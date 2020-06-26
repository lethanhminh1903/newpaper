<div class="sidebar">
    <div class="logo">
        <a href="index.php">
            <img src="views/assets/image/logo.png" width="150">
        </a>
    </div>
    <div class="menu-sidebar">
        <a href="index.php">
            <div class="menu-content" id="home">
                <i class="gg-home-alt"></i> Trang chủ
            </div>
        </a>
        <div class="menu-content">
            <i class="gg-coffee" style="margin-left: 0;"></i> Tin hot
        </div>
        <div class="menu-content">
            <i class="gg-list"></i> Danh mục
        </div>
        <div class="menu-content">
            <i class="gg-calendar-due"></i> Liên hệ
        </div>
        <div class="menu-content">
            <i class="gg-awards"></i> Về chúng tôi
        </div>
    </div>
    <?php 
        if (@$_SESSION['id']) {
            echo '
            <div style="padding-right: 30px;">
                <a href="api/logout/">
                    <div class="logout">
                        <i class="gg-log-off"></i> Đăng xuất
                    </div>
                </a>
            </div>
            ';
        }
    ?>
</div>
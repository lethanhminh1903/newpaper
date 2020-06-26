<div class="sidebar admin">
    <div class="bg-black-admin">
        <div class="logo">
            <a href="../index.php">
                <img src="../views/assets/image/logo-white.png" width="150">
            </a>
        </div>
        <div class="menu-sidebar">
            <a href="index.php">
                <div class="menu-content" id="home-sidebar">
                    <i class="gg-home-alt"></i> Tổng quan
                </div>
            </a>

            <a href="#">
                <div class="menu-content" id="category-sidebar">
                    <i class="gg-stack"></i> Danh mục
                </div>
            </a>

            <a href="dashboard-post.php">
                <div class="menu-content" id="post-sidebar">
                    <i class="gg-list"></i> Bài viết
                </div>
            </a>

            <a href="editor.php">
                <div class="menu-content" id="editor-sidebar">
                    <i class="gg-calendar-due"></i> Biên tập viên
                </div>
            </a>

            <a href="#">
                <div class="menu-content" id="user-sidebar">
                    <i class="gg-user-list"></i> Thành viên
                </div>
            </a>
        </div>
        <?php 
            if (@$_SESSION['admin_id']) {
                echo '
                <div style="padding-right: 30px;padding-left: 30px;">
                    <a href="../api/logout/">
                        <div class="logout">
                            <i class="gg-log-off"></i> Đăng xuất
                        </div>
                    </a>
                </div>
                ';
            }
        ?>
    </div>
</div>
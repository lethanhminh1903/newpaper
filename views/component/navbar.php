<div class="navbar">
    <div class="search">
        <i class="gg-search"></i>
        <input type="text" id="search" placeholder="Search">
    </div>
    <?php 
        if (@$_SESSION['id']) {
            echo '<a href="profile.php"><div class="profile">
                <span class="name">'.$_SESSION['name'].'</span>
                <div class="avatar" style="background: url('.$_SESSION['avatar'].') center center / cover"></div>
            </div></a>';
        } else {
            echo '<div class="profile">
                <a href="login.php"><button>Đăng nhập</button></a>
            </div>';
        }
    ?>
</div>
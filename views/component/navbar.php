<div class="navbar">
    <div class="search">
        <i class="gg-search"></i>
        <input type="text" id="search" placeholder="Search">
    </div>
    <?php 
        if (@$_SESSION['id']) {
            echo '<div class="profile">
                <span class="name">'.$_SESSION['name'].'</span>
                <div class="avatar" style="background: url('.$_SESSION['name'].') center center / cover"></div>
            </div>';
        } else {
            echo '<div class="profile">
                <a href="login.php"><button>Đăng nhập</button></a>
            </div>';
        }
    ?>
</div>
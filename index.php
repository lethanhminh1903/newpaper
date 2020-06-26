<?php
    session_start();
    include_once 'views/component/head.php';
?>
<!DOCTYPE html>
<html>

<head>
    <?php head('Trang chủ | Gud News'); ?>
</head>

<body>
    <div class="container">
        <?php include_once 'views/component/sidebar.php'; ?>
        <div class="row">
            <?php include_once 'views/component/navbar.php'; ?>
            <div class="banner">
                <div class="banner-content">
                    <h1>Gud News</h1>
                    <p>Trong mùa dịch covid-19, hằng ngày chúng ta luôn gặp phải hàng chục, hàng trăm bài báo mỗi ngày, và hầu hết là các bài báo mang tính chất tiêu cực. Để giúp mọi người có cái nhìn tích cực hơn khi truy cập MXH, “Gud News – Tin tức tích cực” được ra đời.</p>
                    <span>Xem chi tiết <i class="gg-arrow-right"></i></span>
                </div>
                <div class="banner-image">
                    <div class="line-dashed"></div>
                    <div class="line-dashed" id="dashed2"></div>
                    <div class="line-dashed" id="dashed3"></div>
                    <img src="views/assets/image/user1.png" class="faa-float animated" id="img1">
                    <img src="views/assets/image/user2.png" class="faa-float animated" id="img2">
                    <img src="views/assets/image/user3.png" class="faa-float animated" id="img3">
                    <img src="views/assets/image/icon/shaps1.png" class="faa-ring animated" id="shaps1">
                    <img src="views/assets/image/icon/shaps2.png" class="faa-spin animated" id="shaps2">
                    <img src="views/assets/image/icon/shaps6.png" class="faa-burst animated" id="shaps3">
                    <img src="views/assets/image/icon/shaps5.png" class="faa-wrench animated" id="shaps4">
                </div>
            </div>
            <div class="news-paper">
                <div class="new" id="new-img">
                    <a id="link_first">
                        <div class="new-blur">
                            <h3 class="new-title" id="new-title"></h3>
                            <div class="new-description" id="new-description"></div>
                            <div class="new-time" id="new-time"></div>
                        </div>
                    </a>
                    <div class="tips">
                        <h3>🚀 Liên hệ quảng cáo</h3>
                        <p>Mọi chi tiết quảng cáo trên trang xin vui lòng liên hệ email: nguyennamhong1412@gmail.com.</p>
                    </div>
                </div>
                <div class="popular">
                    <div class="popular-title">
                        <i class="gg-bell faa-ring animated"></i> Bài viết nổi bật
                    </div>
                    <table id="popular"></table>
                </div>
            </div>
            <div class="news-docs" id="posts">
            </div>
            <?php include_once 'views/component/footer.php'; ?>
        </div>
    </div>
    <script>
        // read product user
        fetch('api/post/read_one.php', {
          method: 'POST', 
          headers: {
            'Content-Type': 'application/json',
          }
        })
        .then(response => response.json())
        .then(data => {
            var title = document.getElementById('new-title'),
            description = document.getElementById('new-description'),
            img = document.getElementById('new-img'),
            link_first = document.getElementById('link_first'),
            time = document.getElementById('new-time');
            title.innerHTML = data.result.title;
            description.innerHTML = data.result.description;
            time.innerHTML = data.result.created;
            img.setAttribute('style', "background: url("+data.result.image+") center center / cover;");
            link_first.setAttribute('href', data.result.link_post);
        })
        .catch((error) => {
          console.error('Error:', error);
        });

        fetch('api/post/read.php', {
          method: 'POST', 
          headers: {
            'Content-Type': 'application/json',
          }
        })
        .then(response => response.json())
        .then(data => {
            var posts = document.getElementById('posts');
            for (a of data.result) {
                posts.insertAdjacentHTML('beforeend',"<div class='news-card'><a href="+a.link_post+"><div class='card-blur' style='background: url("+a.image+") center center / cover'></div><div class='card-img' style='background: url("+a.image+") center center / cover'></div></a><p class='card-category'>Đời sống</p><a href="+a.link_post+"><div class='cart-title'>"+a.title+"</div></a><div class='card-description'>"+a.description+"</div><div class='card-author'><div class='card-author-user'><div class='card-avatar-author' style='background: url("+a.avatar+") center center / cover'></div>"+a.name+"</div><div class='card-time'>"+a.created+"</div></div></div>");
            }
        })
        .catch((error) => {
          console.error('Error:', error);
        });

        fetch('api/post/popular.php', {
          method: 'POST', 
          headers: {
            'Content-Type': 'application/json',
          }
        })
        .then(response => response.json())
        .then(data => {
            var popular = document.getElementById('popular');
            popular.insertAdjacentHTML('beforeend',"<tr id='title'><th>Tên bài viết</th><th id='like'> Lượt thích</th></tr>");
            for (a of data.result) {
                popular.insertAdjacentHTML('beforeend',"<tr><td class='title'>"+a.title+"</td><td class='like'>"+a.total_like+" <img class='heart' src='https://twemoji.maxcdn.com/2/72x72/2764.png' width='20'></td></tr>");
            }
        })
        .catch((error) => {
          console.error('Error:', error);
        });
        document.getElementById('home').classList.add("active");
    </script>
</body>

</html>
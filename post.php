<?php
    session_start();
    include_once 'views/component/head.php';
    $id = $_GET['id'];
    $title = $_GET['title'];
?>
<!DOCTYPE html>
<html>

<head>
    <?php head('Bài đăng chi tiết | Gud News'); ?>
</head>

<body>
    <div class="container">
        <?php include_once 'views/component/sidebar.php'; ?>
        <div class="row">
            <?php include_once 'views/component/navbar.php'; ?>
            <div class="post-detail">
                <div class="post-img" id="image" style="background: url(https://demos.creative-tim.com/vue-material-kit-pro/img/bg5.0b37f7db.jpg) center center / cover">
                    <h1 id="title_detail">How We Built the Most Successful Castle Ever</h1>
                </div>
                <div class="main-post">
                    <div class="card-author-user">
                        <div class="card-avatar-author" id="avatar"></div>
                        <span id="name"></span> - <span id="created"></span>
                    </div>
                    <div id="detail"></div>
                    <div class="like-button"><img src="https://twemoji.maxcdn.com/2/72x72/2764.png" id="like-button" width="20" alt="like"><span id="like-total"></span></div>
                    <h2>Bình luận</h2>
                    <div class="comments">
                        <?php include_once 'views/component/comment.php'; ?>
                        <div id="all-comment"></div>
                    </div>
                </div>
            </div>
            <div class="news-docs">
                <h1>Bài viết cùng chuyên mục</h1>
                <div class="news-card">
                    <div class="card-blur" style="background: url(https://thuthuatnhanh.com/wp-content/uploads/2019/05/gai-xinh-toc-ngan-facebook.jpg) center center / cover"></div>
                    <div class="card-img" style="background: url(https://thuthuatnhanh.com/wp-content/uploads/2019/05/gai-xinh-toc-ngan-facebook.jpg) center center / cover"></div>
                    <p class="card-category">Đời sống</p>
                    <div class="cart-title">
                        Bộ trưởng Tài chính: Thanh tra ngay vụ nghi vấn DN Nhật hối lộ 25 triệu yên
                    </div>
                    <div class="card-description">
                        Bộ trưởng Bộ Tài chính vừa chỉ đạo lập ngay đoàn thanh tra Cục Hải quan và Cục Thuế tỉnh Bắc Ninh để điều tra làm rõ, xử lý nghiêm nghi vấn vụ hối lộ 25 triệu Yên đang gây xôn xao dư luận.
                    </div>
                    <div class="card-author">
                        <div class="card-author-user">
                            <div class="card-avatar-author" style="background: url(https://file.vforum.vn/hinh/2018/05/top-nhung-hinh-anh-ulzzang-girl-chat-dep-nhat-che-mat-buon-cute-35.jpg) center center / cover"></div>
                            Nguyen Nam Hong
                        </div>
                        <div class="card-time">2 giờ trước</div>
                    </div>
                </div>
                <div class="news-card">
                    <div class="card-blur" style="background: url(https://sohanews.sohacdn.com/thumb_w/660/2019/5/5/photo-27-1556990909187936533268-crop-155699121665095351785.jpg) center center / cover"></div>
                    <div class="card-img" style="background: url(https://sohanews.sohacdn.com/thumb_w/660/2019/5/5/photo-27-1556990909187936533268-crop-155699121665095351785.jpg) center center / cover"></div>
                    <p class="card-category">Du lịch</p>
                    <div class="cart-title">
                        Tổng thống Putin bất ngờ trở lại Điện Kremlin
                    </div>
                    <div class="card-description">
                        Tổng thống Vladimir Putin đã có lần xuất hiện hiếm hoi tại Điện Kremlin trong thời gian phong tỏa khi tình hình dịch Covid-19 tại Nga có tín hiệu khả quan.
                    </div>
                    <div class="card-author">
                        <div class="card-author-user">
                            <div class="card-avatar-author" style="background: url(https://file.vforum.vn/hinh/2018/05/top-nhung-hinh-anh-ulzzang-girl-chat-dep-nhat-che-mat-buon-cute-35.jpg) center center / cover"></div>
                            Nguyen Nam Hong
                        </div>
                        <div class="card-time">2 giờ trước</div>
                    </div>
                </div>
                <div class="news-card">
                    <div class="card-blur" style="background: url(https://thuthuatnhanh.com/wp-content/uploads/2019/05/gai-xinh-toc-ngan-facebook.jpg) center center / cover"></div>
                    <div class="card-img" style="background: url(https://thuthuatnhanh.com/wp-content/uploads/2019/05/gai-xinh-toc-ngan-facebook.jpg) center center / cover"></div>
                    <p class="card-category">Sức khoẻ</p>
                    <div class="cart-title">
                        Những phim Châu Á góp mặt trong 100 phim xuất sắc nhất thế kỷ 21
                    </div>
                    <div class="card-description">
                        Mới đây, tờ tin tức The Guardian (Anh) vừa cho ra mắt danh sách bình chọn top 100 phim điện ảnh xuất sắc nhất thế kỷ 21, trong đó có sự góp mặt của 14 phim Châu Á.
                    </div>
                    <div class="card-author">
                        <div class="card-author-user">
                            <div class="card-avatar-author" style="background: url(https://file.vforum.vn/hinh/2018/05/top-nhung-hinh-anh-ulzzang-girl-chat-dep-nhat-che-mat-buon-cute-35.jpg) center center / cover"></div>
                            Nguyen Nam Hong
                        </div>
                        <div class="card-time">2 giờ trước</div>
                    </div>
                </div>
            </div>
            <?php include_once 'views/component/footer.php'; ?>
        </div>
    </div>
    <script>
        data = {id: <?php echo $id; ?>, title: "<?php echo $title; ?>"};
        // add post user
        fetch('api/post/read_post_detail.php', {
          method: 'POST', 
          headers: {
            'Content-Type': 'application/json',
          },
          body: JSON.stringify(data),
        })
        .then(response => response.json())
        .then(data => {
            var image = document.getElementById('image'),
            title = document.getElementById('title_detail'),
            created = document.getElementById('created'),
            name = document.getElementById('name'),
            avatar = document.getElementById('avatar'),
            detail = document.getElementById('detail');

            image.setAttribute('style', "background: url("+data.result.image+") center center / cover");
            title.innerHTML = data.result.title;
            created.innerHTML = data.result.created;
            name.innerHTML = data.result.name;
            avatar.setAttribute('style',"background: url("+data.result.avatar+") center center / cover");
            detail.innerHTML = data.result.detail_description;
            document.title = data.result.title + " | Gud News"

        })
        .catch((error) => {
          console.error('Error:', error);
        });

        var comment = document.getElementById('comment-button');
        var like = document.getElementById('like-button');
        var total = document.getElementById('like-total');

        comment.addEventListener('click',() => {
            var content = document.getElementById('content').value;
            data = {id: <?php echo $id; ?>,content: content};
            // add post user
            fetch('api/comment/add.php', {
                method: 'POST', 
                headers: {
                'Content-Type': 'application/json',
                },
                body: JSON.stringify(data),
            })
            .then(response => response.json())
            .then(data => {
                get_comment_id();
                document.getElementById('content').value = '';
            })
            .catch((error) => {
                console.error('Error:', error);
            });
        });

        like.addEventListener('click',() => {
            data = {id: <?php echo $id; ?>};
            // add like user
            fetch('api/like/add.php', {
                method: 'POST', 
                headers: {
                'Content-Type': 'application/json',
                },
                body: JSON.stringify(data),
            })
            .then(response => response.json())
            .then(data => {
                var like = document.getElementById('like-button');
                var total = document.getElementById('like-total');
                if (data.code == 400) {
                    return false;
                }
                if (data.message != 'unlike') {
                    like.setAttribute('style','filter: none');
                    total.innerHTML = data.like_total + " lượt thích";
                } else {
                    like.setAttribute('style','');
                    total.innerHTML = data.like_total + " lượt thích";
                }                
            })
            .catch((error) => {
              console.error('Error:', error);
            });
        });
        data_like = {id: <?php echo $id; ?>};
        // check like
        fetch('api/like/check.php', {
            method: 'POST', 
            headers: {
            'Content-Type': 'application/json',
            },
            body: JSON.stringify(data_like),
        })
        .then(response => response.json())
        .then(data => {
            var like = document.getElementById('like-button');
            var total = document.getElementById('like-total');
            if (data.message != 'unlike') {
                like.setAttribute('style','filter: none');
            } else {
                like.setAttribute('style','');
            }
            total.innerHTML = data.like_total + " lượt thích";              
        })
        .catch((error) => {
          console.error('Error:', error);
        });

        function get_comment_id() {
            data = {id: <?php echo $id; ?>};
            fetch('api/comment/read-me.php', {
                method: 'POST', 
                headers: {
                'Content-Type': 'application/json',
                },
                body: JSON.stringify(data),
            })
            .then(response => response.json())
            .then(data => {
                show_comment(data);
            })
            .catch((error) => {
              console.error('Error:', error);
            });
        }
        // show all comment
        function show_comment(comment_id){
            data = {id: <?php echo $id; ?>};
            console.log('hihi');
            fetch('api/comment/read.php', {
                method: 'POST', 
                headers: {
                'Content-Type': 'application/json',
                },
                body: JSON.stringify(data),
            })
            .then(response => response.json())
            .then(data => {
                var comment = document.getElementById('all-comment');
                comment.innerHTML = '';
                for (a of data.result) {
                    if (comment_id.result.id.indexOf(a.id) == -1) {
                        comment.insertAdjacentHTML('beforeend',"<div class='comment'><div class='content-comment'><h4>"+a.name+" - "+a.created+"</h4><p>"+a.content+"</p><div class='avatar-comment' style='background: url("+a.avatar+") center center / cover;'></div></div>");
                    } else {
                        comment.insertAdjacentHTML('beforeend',"<div class='comment'><div class='content-comment'><h4>"+a.name+" - "+a.created+"</h4><p>"+a.content+"</p><div class='avatar-comment' style='background: url("+a.avatar+") center center / cover;'></div><div onclick='remove_comment("+a.id+")' class='remove-comment'>x</div></div></div>");
                    }
                }
            })
            .catch((error) => {
              console.error('Error:', error);
            });
        }

        function remove_comment(id) {
            data = {id: id};
            fetch('api/comment/delete.php', {
                method: 'POST', 
                headers: {
                'Content-Type': 'application/json',
                },
                body: JSON.stringify(data),
            })
            .then(response => response.json())
            .then(data => {
                get_comment_id();
            })
            .catch((error) => {
              console.error('Error:', error);
            });
        }
        get_comment_id();
    </script>
</body>

</html>
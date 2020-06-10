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
                    <p>Một trang web tin tức nhanh, tổng hợp từ các nguồn báo chính thống. Đồng thời có chức năng điểm tin, giúp người dùng tiếp nhận thông tin một cách nhanh nhất.</p>
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
                <div class="new">
                    <div class="new-blur">
                        <h3 class="new-title">Ở đây chúng tôi bán sự cô đơn mà bạn vẫn luôn có, bạn muốn mua không?</h3>
                        <div class="new-description">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer. This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer. This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</div>
                        <div class="new-time">Last updated 3 mins ago</div>
                    </div>
                    <div class="tips">
                        <h3>🚀 Liên hệ quảng cáo</h3>
                        <p>Mọi chi tiết quảng cáo trên trang xin vui lòng liên hệ email: nguyennamhong1412@gmail.com.</p>
                    </div>
                </div>
                <div class="popular">
                    <div class="popular-title">
                        <i class="gg-bell faa-ring animated"></i> Bài viết nổi bật
                    </div>
                    <table>
                        <tr id="title">
                            <th>Tên bài viết</th>
                            <th id="like"> Lượt thích</th>
                        </tr>
                        <tr>
                            <td class="title">Ở đây chúng tôi bán sự cô đơn mà bạn vẫn luôn có, bạn muốn mua không?</td>
                            <td class="like">
                                12 <img class="heart" src="https://twemoji.maxcdn.com/2/72x72/2764.png" width="20">
                            </td>
                        </tr>
                        <tr>
                            <td class="title">Ở đây chúng tôi bán sự cô đơn</td>
                            <td class="like">
                                12 <img class="heart" src="https://twemoji.maxcdn.com/2/72x72/2764.png" width="20">
                            </td>
                        </tr>
                        <tr>
                            <td>Ở đây chúng tôi bán sự cô đơn</td>
                            <td class="like">
                                12 <img class="heart" src="https://twemoji.maxcdn.com/2/72x72/2764.png" width="20">
                            </td>
                        </tr>
                        <tr>
                            <td>Ở đây chúng tôi bán sự cô đơn</td>
                            <td class="like">
                                12 <img class="heart" src="https://twemoji.maxcdn.com/2/72x72/2764.png" width="20">
                            </td>
                        </tr>
                        <tr>
                            <td>Ở đây chúng tôi bán sự cô đơn</td>
                            <td class="like">
                                12 <img class="heart" src="https://twemoji.maxcdn.com/2/72x72/2764.png" width="20">
                            </td>
                        </tr>
                        <tr>
                            <td>Ở đây chúng tôi bán sự cô đơn</td>
                            <td class="like">
                                12 <img class="heart" src="https://twemoji.maxcdn.com/2/72x72/2764.png" width="20">
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="news-docs">
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
</body>

</html>
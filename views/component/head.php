<?php 
function head(
    $title,
    $description = "Một trang web tin tức nhanh, tổng hợp từ các nguồn báo chính thống. Đồng thời có chức năng điểm tin, giúp người dùng tiếp nhận thông tin một cách nhanh nhất.",
    $image = "views/assets/image/banner/1.png"
) {
echo '<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="views/assets/image/favicon.png">
    <!-- Primary Meta Tags -->
    <title>'.$title.'</title>
    <meta name="title" content="'.$title.'">
    <meta name="description" content="'.$description.'">
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:title" content="'.$title.'">
    <meta property="og:description" content="'.$description.'">
    <meta property="og:image" content="'.$image.'">
    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="">
    <meta property="twitter:title" content="'.$title.'">
    <meta property="twitter:description" content="'.$description.'">
    <meta property="twitter:image" content="'.$image.'">
    <!-- Style -->
    <link rel="stylesheet" href="views/assets/css/style.css">
    <link rel="stylesheet" href="views/assets/css/css.css">
    <link rel="stylesheet" href="views/assets/css/animation.min.css">';
}
?>
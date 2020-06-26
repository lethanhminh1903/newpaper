<?php 
	include_once '../api/config/simple_html_dom.php';
	$html_dantri = file_get_html("https://dantri.com.vn/");
    $list_dantri = $html_dantri->find('div[class=box1 clearfix] ',0)->find('div[data-boxtype=homenewsposition] a',0);
    $bigtitle_dantri= $list_dantri->title;
    $biglink_dantri = "https://dantri.com.vn".$list_dantri->href;
    echo "<p>🚀 <a href='$biglink_dantri'>".$bigtitle_dantri."</a><button class='hihi' data-link='$biglink_dantri'>Lấy bài viết</button></p>";
    $list = $html_dantri->find('div[class=xnano-content] a' );
    foreach ( $list as $item  ) {
        $link_dantri = "https://dantri.com.vn".$item->href;
        $text_dantri = $item->plaintext;
        echo "<p>🚀 <a href='$link_dantri'>".$text_dantri."</a><button class='hihi' data-link='$link_dantri'>Lấy bài viết</button></p>";
    }
?>
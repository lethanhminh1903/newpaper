<?php 
    if (@$_SESSION['id']) {
        echo '
        <div class="comment">
            <div class="content-comment">
                <textarea id="content" cols="30" rows="10"></textarea>
                <button id="comment-button" class="button-custom">Bình luận</button>
                <div class="avatar-comment" style="background: url('.$_SESSION['avatar'].') center center / cover;"></div>
            </div>
        </div>';
    } else {
        echo "<input type='hidden' id='comment-button'>";
    }
?>
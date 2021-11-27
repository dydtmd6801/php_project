<?php
    session_start();
    if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
    else $userid = "";
?>
<header id="main_header">
    <div id="top_gnb">
        <div id="main_logo"><a href="index.php">Yong'S in Culture<a></div>
        <div id="main_menu">
            <ul class="main_top_menu">
                <li class="top_sub_menu"><a href="#">영화 목록</a></li>
                <li class="top_sub_menu"><a href="theater_exhibition.php">연극­·전시 목록</a></li>
                <li class="top_sub_menu"><a href="#">관객들 이야기</a></li>
                <?php if(!$userid) { ?>
                    <li class="top_sub_menu_img"><a href="login_form.php"><img src="./img/login_white.png" alt="로그인"/></a></li>
                <?php } else { ?>
                    <li class="top_sub_menu_img"><a href="#"><img src="./img/logout_white.png" alt="로그아웃"></a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
    <div id="main_text">
        <div id="title_text">test</div>
        <div id="sub_text">testtest</div>
    </div>
</header>
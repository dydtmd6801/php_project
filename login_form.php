<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/no_scroll.css">
    <link rel="stylesheet" href="./css/login_form.css">
    <script src="./js/check_login.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@300;400;700&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <?php
    //  include "header.php"; 
    ?>
    <header><a href="index.php">Yong'S in Culture</a></header>
    <section>
        <div id="login_content">
            <form id="id_login_check" name="login_check" action="login_check.php" method="post">
                <div id="div_id_value">
                    <input type="text" name="id_name" id="id_value" placeholder="아이디">
                </div>
                <div id="div_pw_value">
                    <input type="password" name="pw_name" id="pw_value" placeholder="비밀번호">
                </div>
                <button onclick="check_login()" type="button" id="login_btn">로그인</button>
            </form>
            <p>아직 회원이 아니신가요?<a href="register_form.php">회원가입</a></p>
        </div>
    </section>
    <footer>
    </footer>
    <?php 
    // include "footer.html";
    ?>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/login_register_form.css">
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js' integrity='sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==' crossorigin='anonymous'></script>
    <title>Document</title>
    <script>
        $(document).ready(function(){
            $('.message a').click(function(){
                $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
            });
        })
    </script>
    <script src="./js/login_regi.js"></script>
</head>
<body>
    <div class="login-page">
    <div class="form">
        <p id="login-title"><a href="index.php">Yong'S in Culture</a></p>
        <form id="register-form-id" class="register-form" action="register_insert.php" method="post">
            <div>
                <input type="text" name="regi_id_data" id="regi_id" placeholder="아이디"/>
                <button type="button" id="check_id" onclick="check_register_id()">중복체크</button>
            </div>
            <input type="password" name="regi_pw_data" id="regi_pw" placeholder="비밀번호"/>
            <input type="password" id="regi_pw_check" placeholder="비밀번호 확인"/>
            <input type="text" name="regi_name_data" id="regi_name" placeholder="이름"/>
            <div>
                <input type="text" name="regi_nick_data" id="regi_nickname" placeholder="닉네임"/>
                <button type="button" id="check_nick" onclick="check_register_nick()">중복체크</button>
            </div>
            <input type="text" name="regi_email_data" id="regi_email" placeholder="이메일"/>
            <button type="button" onclick="check_regi_data()">회원가입</button>
            <p class="message">이미 회원이신가요? <a href="#"> 로그인 </a></p>
        </form>
        <form id="login-form-id" class="login-form" action="login_check.php" method="post">
            <input type="text" name="login_id_data" id="login_id" placeholder="아이디"/>
            <input type="password" name="login_pw_data" id="login_pw" placeholder="비밀번호"/>
            <button type="button" onclick="check_login_data()">로그인</button>
            <p class="message">회원이 아니신가요? <a href="#"> 회원가입 </a></p>
        </form>
    </div>
    </div>
</body>
</html>
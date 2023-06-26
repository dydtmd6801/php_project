<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/login_register_form.css">
    <style>
        #nav {
            display: flex;
            flex-direction: row;
            justify-content: space-evenly;
            margin-top: 45px;
        }
        .btns {
            width: 40% !important;
        }
    </style>
    <title>회원가입 완료</title>
</head>
<body>
    <div class="login-page">
    <div class="form">
        <p id="login-title"><a href="index.php">Dragon Review</a></p>
        <p> 회원가입이 완료되었습니다 </p>
        <div id="nav">
            <button class="btns" onclick="location.href='index.php'">메인으로</button>
            <button class="btns" onclick="location.href='login_register_form.php'">로그인하기</button>
        </div>
    </div>
    </div>
</body>
</html>
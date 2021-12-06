<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@300;400;700&display=swap" rel="stylesheet">
    <script src="./js/check_register.js"></script>
    <title>Document</title>
</head>
<body>
    <?php include "header.php"; ?>
    <section>
        <p>회원가입</p>
        <form id="register_form" name="regi" action="register_insert.php" method="post">
            <div id="regi">
                <div class="check_form">
                    <div class="col1">아이디</div>
                    <div class="col2">
                        <input type="text" name="data_id" id="id_value" value="">
                    </div>
                    <button type="button" onclick="check_register_id()">중복확인</button>
                </div>
                <div class="regi_form">
                    <div class="col1">비밀번호</div>
                    <div class="col2">
                        <input type="text" name="data_pw" id="pw_value" value="">
                    </div>
                </div>
                <div class="regi_form">
                    <div class="col1">비밀번호 확인</div>
                    <div class="col2">
                        <input type="text" name="" id="check_pw_value" value="">
                    </div>
                </div>
                <div class="regi_form">
                    <div class="col1">이름</div>
                    <div class="col2">
                        <input type="text" name="data_name" id="name_value" value="">
                    </div>
                </div>
                <div class="check_form">
                    <div class="col1">닉네임</div>
                    <div class="col2">
                        <input type="text" name="data_nick" id="nick_value" value="">
                    </div>
                    <button type="button" onclick="check_register_nick()">중복확인</button>
                </div>
                <div class="regi_form">
                    <div class="col1">이메일</div>
                    <div class="col2">
                        <input type="text" name="data_email" id="email_value">@
                        <input type="text" name="data_email_domain" id="email_value_domain" value="">
                        <select id="id_domain" name="data_domain" onchange="select_domain()">
                            <option value="no">직접입력</option>
                            <option value="naver.com">naver.com</option>
                            <option value="daum.com">daum.net</option>
                            <option value="gmail.com">gmail.com</option>
                        </select>
                        <span id="direct"></span>
                    </div>
                </div>
            </div>
            <button id="submit_btn" type="button" onclick="check_register_form()">회원가입</button>
        </form>
    </section>
    <?php include "footer.html"; ?>
</body>
</html>
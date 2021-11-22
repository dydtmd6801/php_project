<!DOCTYPE html>
<html lang="en">
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
    <title>Document</title>
</head>
<body>
    <?php include "header.php"; ?>
    <section>
        <p>회원가입</p>
        <form name="regi" action="register_insert.php" method="post">
            <div id="regi">
                <div class="check_form">
                    <div class="col1">아이디</div>
                    <div class="col2">
                        <input type="text" name="data_id">
                    </div>
                    <button type="button" onclick="id_check()">중복확인</button>
                </div>
                <div class="regi_form">
                    <div class="col1">비밀번호</div>
                    <div class="col2">
                        <input type="text" name="data_pw">
                    </div>
                </div>
                <div class="regi_form">
                    <div class="col1">비밀번호 확인</div>
                    <div class="col2">
                        <input type="text" name="" value="">
                    </div>
                </div>
                <div class="regi_form">
                    <div class="col1">이름</div>
                    <div class="col2">
                        <input type="text" name="data_name">
                    </div>
                </div>
                <div class="check_form">
                    <div class="col1">닉네임</div>
                    <div class="col2">
                        <input type="text" name="data_nick">
                    </div>
                    <button type="button" onclick="id_check()">중복확인</button>
                </div>
                <div class="regi_form">
                    <div class="col1">이메일</div>
                    <div class="col2">
                        <input type="text" name="data_email">@
                        <select name="doname">
                            <option value="naver">naver.com</option>
                            <option value="daum">daum.net</option>
                            <option value="gmail">gmail.com</option>
                            <option value="no">직접입력</option>
                        </select>
                    </div>
                </div>
            </div>
            <button type="button">초기화</button>
            <button type="button">회원가입</button>
        </form>
    </section>
    <?php include "footer.html"; ?>
</body>
</html>
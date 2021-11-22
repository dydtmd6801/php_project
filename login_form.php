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
        <div>
            <form name="login_check" action="login_check.php" method="post">
                아이디 <input type="text"><br>
                비밀번호 <input type="password">
                <button type="button">로그인</button>
            </form>
        </div>
        <div>
            <p>아직 회원이 아니신가요?<a href="register_form.php">회원가입</a></p>
        </div>
    </section>
    <?php include "footer.html"; ?>
</body>
</html>
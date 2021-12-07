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
    <script>
        function check_change_form(){
            if(!document.getElementById("pw_value_change").value){
                alert("비밀번호를 입력해주세요!");
                document.getElementById("pw_value_change").focus();
                return;
            }
            if(!document.getElementById("check_pw_value_change").value){
                alert("비밀번호 확인을 입력해주세요!");
                document.getElementById("check_pw_value_change").focus();
                return;
            }
            if(!document.getElementById("name_value_change").value){
                alert("이름을 입력해주세요!");
                document.getElementById("name_value_change").focus();
                return;
            }
            if(!document.getElementById("email_value_change").value){
                alert("이메일을 입력해주세요!");
                document.getElementById("email_value_change").focus();
                return;
            }
            if(!document.getElementById("email_value_domain_change").value){
                alert("이메일 주소를 입력해주세요!");
                document.getElementById("email_value_domain_change").focus();
                return;
            }
            if(document.getElementById("pw_value_change").value != document.getElementById("check_pw_value_change").value){
                alert("비밀번호가 맞지않습니다.");
                document.getElementById("pw_value_change").focus();
                return;
            }
            document.getElementById("change_form").submit();
        }
        function select_domain(){
            if(document.getElementById("id_domain_change").value == "no"){
                document.getElementById("email_value_domain_change").value = "";
            } else {
                document.getElementById("email_value_domain_change").value = document.getElementById("id_domain_change").value;
            }
        }
    </script>
</head>
<body>
    <?php
    $id = $_GET["id"];
    $con = mysqli_connect("localhost", "php_project", "1234", "php_project");
    $sql = "select * from user where id='$id'";
    $result = mysqli_query($con, $sql);
    $result_row = mysqli_fetch_array($result);
    $id = $result_row["id"];
    $nick = $result_row["nickname"];
    ?>
    <?php include "header.php"; ?>
    <section>
    <p>나의 정보 변경</p>
        <form id="change_form" name="user_change" action="user_change.php?id=<?=$id?>" method="post">
            <div id="chag">
                <div class="check_form">
                    <div class="col1">아이디</div>
                    <span><?=$id?></span>
                </div>
                <div class="regi_form">
                    <div class="col1">비밀번호</div>
                    <div class="col2">
                        <input type="text" name="data_pw" id="pw_value_change" value="">
                    </div>
                </div>
                <div class="regi_form">
                    <div class="col1">비밀번호 확인</div>
                    <div class="col2">
                        <input type="text" name="" id="check_pw_value_change" value="">
                    </div>
                </div>
                <div class="regi_form">
                    <div class="col1">이름</div>
                    <div class="col2">
                        <input type="text" name="data_name" id="name_value_change" value="">
                    </div>
                </div>
                <div class="check_form">
                    <div class="col1">닉네임</div>
                    <span><?=$nick?></span>
                </div>
                <div class="regi_form">
                    <div class="col1">이메일</div>
                    <div class="col2">
                        <input type="text" name="data_email" id="email_value_change">@
                        <input type="text" name="data_email_domain" id="email_value_domain_change" value="">
                        <select id="id_domain_change" name="data_domain" onchange="select_domain()">
                            <option value="no">직접입력</option>
                            <option value="naver.com">naver.com</option>
                            <option value="daum.com">daum.net</option>
                            <option value="gmail.com">gmail.com</option>
                        </select>
                    </div>
                </div>
            </div>
            <button type="button" id="submit_btn_change" onclick="check_change_form()">변경</button>
            <button type="button" id="cancel_btn_change" onclick="location.href='user_info.php'">취소</button>
        </form>
    </section>
    <?php include "footer.html"; ?>
</body>
</html>
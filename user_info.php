<?php
    session_start();
    if (isset($_SESSION["userid"])){ 
        $userid = $_SESSION["userid"];
    } else{ 
        $userid = "";
        echo "
            <script>
                alert('로그인을 해주세요!');
                location.href='index.php';
            </script>
             ";
    }
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/mypage_form.css">
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js' integrity='sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==' crossorigin='anonymous'></script>
    <title>마이페이지</title>
    <script>
        $(document).ready(function(){
            $('.message a').click(function(){
                $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
            });
        });
        function check_modify(){
            if(!document.getElementById("modify_pw").value){
                alert("비밀번호를 입력해주세요!");
                document.getElementById("modify_pw").focus();
                return;
            }
            if(!document.getElementById("modify_pw_check").value){
                alert("비밀번호 확인을 입력해주세요!");
                document.getElementById("modify_pw_check").focus();
                return;
            }
            if(!document.getElementById("modify_name").value){
                alert("이름을 입력해주세요!");
                document.getElementById("modify_name").focus();
                return;
            }
            if(!document.getElementById("modify_email").value){
                alert("이메일을 입력해주세요!");
                document.getElementById("modify_email").focus();
                return;
            }
            document.getElementById("mypage-edit-id").submit();
        }
        function show_detail_id(id_data){
            var info_id = document.getElementsByClassName("plac_sty")[0];
            info_id.value = "";
            info_id.placeholder = "아이디";
            info_id.addEventListener("mouseleave", ()=>{info_id.value = id_data});
        }
        function show_detail_name(name_data){
            var info_name = document.getElementsByClassName("plac_sty")[1];
            info_name.value = "";
            info_name.placeholder = "이름";
            info_name.addEventListener("mouseleave", () => info_name.value = name_data)
        }
        function show_detail_nick(nick_data){
            var info_nick = document.getElementsByClassName("plac_sty")[2];
            info_nick.value = "";
            info_nick.placeholder = "닉네임";
            info_nick.addEventListener("mouseleave", () => info_nick.value = nick_data)
        }
        function show_detail_email(email_data){
            var info_email = document.getElementsByClassName("plac_sty")[3];
            info_email.value = "";
            info_email.placeholder = "이메일";
            info_email.addEventListener("mouseleave", () => info_email.value = email_data)
        }
    </script>
    <script src="./js/login_regi.js"></script>
</head>
<body>
    <?php
        $con = mysqli_connect("localhost", "php_project", "1234", "php_project");
        $sql = "select * from user where id='$userid'";
        $result = mysqli_query($con, $sql);
        
        $result_row = mysqli_fetch_array($result);

        $id = $result_row["id"];
        $pw = $result_row["pw"];
        $name = $result_row["name"];
        $email = $result_row["email"];
        $nick = $result_row["nickname"];
    ?>
    <div class="login-page">
    <div class="form">
        <p id="mypage-title">마이페이지</p>
        <form class="mypage-show-form">
            <input type="text" class="plac_sty" value="<?=$id?>" placeholder="" onmouseover="show_detail_id('<?=$id?>')" readonly/>
            <input type="text" class="plac_sty" value="<?=$name?>" placeholder="" onmouseover="show_detail_name('<?=$name?>')" readonly/>
            <input type="text" class="plac_sty" value="<?=$nick?>" placeholder="" onmouseover="show_detail_nick('<?=$nick?>')" readonly/>
            <input type="text" class="plac_sty" value="<?=$email?>" placeholder="" onmouseover="show_detail_email('<?=$email?>')" readonly/>
            <p class="message"><a href="#"> 정보수정 </a><a href="user_logout.php"> 로그아웃 </a><a href="index.php"> 취소 </a></p>
        </form>
        
        <form class="mypage-edit-form" action="user_change.php" method="post" id="mypage-edit-id">
            <input type="text" class="plac_sty" placeholder="<?=$id?>" readonly/>
            <input type="password" id="modify_pw" name="data_pw" placeholder="비밀번호"/>
            <input type="password" id="modify_pw_check" placeholder="비밀번호 확인"/>
            <input type="text" id="modify_name" name="data_name" placeholder="이름"/>
            <input type="text" class="plac_sty" placeholder="<?=$nick?>" readonly/>
            <input type="text" id="modify_email" name="data_email" placeholder="이메일"/>
            <button type="button" onclick="check_modify()">정보수정</button>
            <p class="message"><a href="user_delete.php?id=<?=$id?>" style="color: red"> 회원탈퇴 </a><a href="#"> 취소 </a></p>
        </form>
    </div>
    </div>
</body>
</html>
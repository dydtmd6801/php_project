<?php
$id = $_POST["regi_id_data"];
$pw = $_POST["regi_pw_data"];
$name = $_POST["regi_name_data"];
$nick = $_POST["regi_nick_data"];
$email = $_POST["regi_email_data"];
$regist_day = date("Y-m-d H:i:s");

$con = mysqli_connect("localhost", "php_project", "1234", "php_project");

$sql = "insert into user (id, password, name, email, nickname, regist_day, level )";
$sql .= "values ('$id', '$pw', '$name', '$email', '$nick', '$regist_day', 1)";

mysqli_query($con, $sql);
mysqli_close($con);

echo "
    <script>
        alert('회원가입이 완료되었습니다');
        location.href = 'login_register_submit.php';
    </script>
    ";
?>
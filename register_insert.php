<?php
$id = $_POST["data_id"];
$pw = $_POST["data_pw"];
$name = $_POST["data_name"];
$nick = $_POST["data_nick"];
$email = $_POST["data_email"];
$email_domain = $_POST["data_domain"];
$email_domain_direct = $_POST["data_domain_direct"];

if(!$email_domain == "no"){
    $email_domain = $email_domain_direct;
}
$email = $email."@".$email_domain;
$regist_day = date("Y-m-d (H:i)");

$con = mysqli_connect("localhost", "", "", "php_project");

$sql = "insert into user (id, password, name, email, nickname, regist_day, level )";
$sql .= "values ('$id', '$pw', '$name', '$email', '$nick', '$regist_day', 1)";

mysqli_query($con, $sql);
mysqli_close($con);

echo "
    <script>
        alert('회원가입이 완료되었습니다');
        location.href = 'login_form.php';
    </script>
    ";
?>
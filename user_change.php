<?php
$id = $_GET["id"];
$pw = $_POST["data_pw"];
$name = $_POST["data_name"];
$email = $_POST["data_email"];
$email_domain = $_POST["data_email_domain"];

$email = $email."@".$email_domain;
$modify_day = date("Y-m-d (H:i)");

$con = mysqli_connect("localhost", "php_project", "1234", "php_project");
$sql = "update user set password='$pw', name='$name', email='$email', modify_day='$modify_day' where id='$id'";
echo $sql;
mysqli_query($con, $sql);
mysqli_close($con);

echo 
    "
    <script>
        alert('정보 수정이 완료되었습니다!');
        location.href='user_info.php';
    </script>
    ";
?>
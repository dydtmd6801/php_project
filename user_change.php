<?php
    session_start();
    if (isset($_SESSION["userid"])){ 
        $id = $_SESSION["userid"];
    } else{ 
        $id = "";
        echo "
            <script>
                alert('로그인을 해주세요!');
                location.href='index.php';
            </script>
             ";
    }
// $id = $_GET["id"];
$pw = $_POST["data_pw"];
$name = $_POST["data_name"];
$email = $_POST["data_email"];

$email = $email."@".$email_domain;
$modify_day = date("Y-m-d H:i:s");

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
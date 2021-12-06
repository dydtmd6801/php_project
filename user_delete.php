<?php
$id = $_GET["id"];
$con = mysqli_connect("localhost", "php_project", "1234", "php_project");
$sql = "delete from user where id='$id'";
mysqli_query($con, $sql);
mysqli_close($con);
session_start();
unset($_SESSION["userid"]);
echo    
    "<script>
        alert('회원탈퇴가 왼료되었습니다.');
        location.href='index.php';
    </script>";
?>
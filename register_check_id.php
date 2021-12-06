<?php
$id = $_GET["id"];

$con = mysqli_connect("localhost", "php_project", "1234", "php_project");
$sql = "select * from user where id='$id'";
$result = mysqli_query($con, $sql);

$result_num = mysqli_num_rows($result);

if($result_num){
    echo "사용이 불가한 아이디입니다.";
}else{
    echo "사용이 가능한 아이디입니다.";
}

mysqli_close($con);
?>
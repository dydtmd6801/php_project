<?php
$check = $_GET["check"];
$check_str = $_GET["check_str"];
$check_str = str_replace("'","",$check_str);
$check_str = substr($check_str, 0, strlen($check_str)-1);
$con = mysqli_connect("localhost", "php_project", "1234", "php_project");
for($i = 0; $i < $check; $i++){
    $check_str_explode = explode(",",$check_str);
    $sql = "delete from user where id='".$check_str_explode[$i]."'";
    // echo $sql."<br>";
    mysqli_query($con, $sql);
}
mysqli_close($con);

echo    "
        <script>
            alert('삭제되었습니다!');
            location.href='admin_page.php'
        </script>
        "

?>
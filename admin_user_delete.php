<?php
$rm_id = $_GET["id"];
$con = mysqli_connect("localhost", "php_project", "1234", "php_project");
$sql = "delete from user where id='$rm_id'";
mysqli_query($con, $sql);

echo    "
        <script>
            alert('삭제되었습니다!');
            location.href='admin_page.php';
        </script>
        ";
?>
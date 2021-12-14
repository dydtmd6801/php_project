<?php
$modify_id = $_GET["id"];
$admin_form_name = $_POST["admin_form_name"];
$admin_form_email = $_POST["admin_form_email"];
$admin_form_level = $_POST["admin_form_level"];

$modify_day = date("Y-m-d H:i:s");

$con = mysqli_connect("localhost", "php_project", "1234", "php_project");
$sql = "update user set name='$admin_form_name', email='$admin_form_email', modify_day='$modify_day', level='$admin_form_level' where id='$modify_id'";
echo $sql;
mysqli_query($con, $sql);

echo    "
        <script>
            alert('수정되었습니다');
            location.href='admin_page.php';
        </script>
        ";

?>
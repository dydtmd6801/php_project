<?php
$id = $_POST["id_name"];
$pw = $_POST["pw_name"];

$con = mysqli_connect("localhost", "php_project", "1234", "php_project");
$sql = "select * from user where id='$id'";
$result = mysqli_query($con, $sql);

$num_check = mysqli_num_rows($result);

if(!$num_check){
    echo "
        <script>
            window.alert('아이디가 올바르지 않습니다.)';
            history.go(-1);
        </script>
        ";
} else {
    $result_row = mysqli_fetch_array($result);
    $db_pw = $result_row["password"];

    mysqli_close($con);

    if($pw != $db_pw){
        echo "
            <script>
                window.alert('비밀번호가 올바르지 않습니다.);
                history.go(-1);
            </script>
        ";
        exit;
    } else {
        session_start();
        $_SESSION["userid"] = $result_row["id"];

        echo "
            <script>
                location.href = 'index.php';
            </script>
        ";
    }
}
?>
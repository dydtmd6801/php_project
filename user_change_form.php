<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    // $id = $_GET["id"]
    // $con = mysqli_connect("localhost", "php_project", "1234", "php_project");
    // $sql = "select * from user where id='$id'";
    // $result = mysqli_query($con, $sql);
    // $result_row = mysqli_fetch_array($result)
    //     $id = $result_row["id"];
    //     $pw = $reuslt_row["pw"];
    //     $name = $result_row["name"];
    //     $nick = $result_row["nickname"];

    ?>
    <form action="change_user_insert.php" method="post">
    <p>마이페이지 변경</p>
    이름 : <input type="text" value="">
    비밀번호 : <input type="text" value="">
    비밀번호 확인 : <input type="text" value="">
    이름
    </form>
</body>
</html>
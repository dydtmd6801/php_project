<?php
    session_start();
    if (isset($_SESSION["userid"])){ 
        $userid = $_SESSION["userid"];
    } else{ 
        $userid = "";
        echo "
            <script>
                alert('로그인을 해주세요!');
                location.href='index.php';
            </script>
             ";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@300;400;700&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <?php include "header.php" ?>
    <?php
    $con = mysqli_connect("localhost", "", "", "php_project");
    $sql = "select * from user where id='$userid'";
    // echo $sql;
    $result = mysqli_query($con, $sql);
    
    $result_row = mysqli_fetch_array($result);

    $id = $result_row["id"];
    $pw = $result_row["pw"];
    $name = $result_row["name"];
    $email = $result_row["email"];
    $nick = $result_row["nick"];
    ?>
    <p>마이페이지</p>
    <table>
        <tr>
            <td>아이디</td>
            <td><?=$id?></td>
        </tr>
        <tr>
            <td>이름</td>
            <td><?=$name?></td>
        </tr>
        <tr>
            <td>별명</td>
            <td><?=$nick?></td>
        </tr>
        <tr>
            <td>이메일</td>
            <td><?=$email?></td>
        </tr>
    </table>
    <?php include "footer.html" ?>
</body>
</html>
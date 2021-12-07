<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/footer.css">
    <title>Document</title>
</head>
<body>
    <?php include "header.php"; ?>
    <?php
    $con = mysqli_connect("localhost", "php_project", "1234", "php_project");
    $sql = "select * from review";
    $result = mysqli_query($con, $sql);
    
    while ($result_row = mysqli_fetch_array($result)){
        $num        = $result_row["num"];
        $id         = $result_row["id"];
        $name       = $result_row["name"];
        $nickname   = $result_row["nickname"];
        $subject    = $result_row["subject"];
        $content    = $result_row["content"];
        $regist_day = $result_row["regist_day"];
        $star       = $result_row["star"];
        $gubun      = $result_row["gubun"];
        ?>
        <div id="reivew_article">
            <div id="review_top">
                <p> 별점 : <?=$star?></p>
                <p> 닉네임 : <?=$nickname?></p>
                <p> 작성일 : <?=$regist_day?></p>
            </div>
            <div id="review_title">
                <p> 제목 : <?=$subject?></p>
            </div>
            <div id="review_content">
                <p> 내용 : <?=$content?></p>
            </div>
        </div>
        <?php
    }
    ?>
    <section>

    </section>
    <?php include "footer.html" ?>
</body>
</html>
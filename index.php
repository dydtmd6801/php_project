<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/index_header.css">
    <link rel="stylesheet" href="./css/index_section.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@300;400;700&display=swap" rel="stylesheet">
    <title>Dragon Review</title>
</head>
<body>
    <?php include "index_header.php"; ?>
    <?php
    $con = mysqli_connect("localhost", "php_project", "1234", "php_project");
    $sql = "select * from like_cnt";
    $result = mysqli_query($con, $sql);
    $result_array = mysqli_fetch_array($result);
    ?>
    <section>
        <div id="main_section">
            <?php
            
            ?>
            <div>
                <?=$result_array[5]?>                
            </div>
            <div>
            </div>
        </div>
    </section>
    <?php include "footer.html" ?>
</body>
</html>
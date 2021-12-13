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
    <section>
        <div id="main_section">
            <div>
                <div class="ranking_subject">
                    <a href="review_show_PF.php">연극 Review<a>
                </div>
                <ul class="ranking_content">
                    <li class="ranking_content_title">
                        <span>제목</span>
                        <span>내용</span>
                        <span>별점</span>
                        <span>추천</span>
                    </li>
            <?php
            $con = mysqli_connect("localhost", "php_project", "1234", "php_project");
            $sql = "select * from review where gubun='PF' order by like_num desc";
            $result = mysqli_query($con, $sql);
            for($i = 0; $i < 5; $i++){
                $result_row = mysqli_fetch_array($result);
                $subject  = $result_row["subject"];
                $content  = $result_row["content"];
                $star     = $result_row ["star"];
                $like_num = $result_row["like_num"];
                ?>
                    <li class="ranking_sub_content">
                        <span><?=$subject?></span>
                        <span><?=$content?></span>
                        <span><img src="./img/star.png"><?=$star?></span>
                        <span><img src="./img/heart.png"><?=$like_num?></span>
                    </li>
                <?php
            }
            ?>
                </ul>
            </div>
            
            <div>
                <div class="ranking_subject">
                    <a href="review_show_PF.php">전시 Review</a>
                </div>
                <ul class="ranking_content">
                    <li class="ranking_content_title">
                        <span>제목</span>
                        <span>내용</span>
                        <span>별점</span>
                        <span>추천</span>
                    </li>
            <?php
            $con = mysqli_connect("localhost", "php_project", "1234", "php_project");
            $sql = "select * from review where gubun='DP' order by like_num desc";
            $result = mysqli_query($con, $sql);
            for($i = 0; $i < 5; $i++){
                $result_row = mysqli_fetch_array($result);
                $subject  = $result_row["subject"];
                $content  = $result_row["content"];
                $star     = $result_row ["star"];
                $like_num = $result_row["like_num"];
                ?>
                    <li class="ranking_sub_content">
                        <span><?=$subject?></span>
                        <span><?=$content?></span>
                        <span><img src="./img/star.png"><?=$star?></span>
                        <span><img src="./img/heart.png"><?=$like_num?></span>
                    </li>
                <?php
            }
            ?>
                </ul>
            </div>
        </div>
    </section>
    <?php include "footer.html" ?>
</body>
</html>
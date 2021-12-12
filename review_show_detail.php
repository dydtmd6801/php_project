<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/starRating.css">
    <link rel="stylesheet" href="./css/no_scroll.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@300;400;700&display=swap" rel="stylesheet">
    <title>Document</title>
    <style>
        section {
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
        }
        #review_subject {
            margin-bottom: 10px;
            font-size: 1.1em;
        }
        #img-area{
            width: 280px;
            height: 400px;
            border: 1px solid black;
            margin: 0 5% 0 0;
        }
        #id_content{
            font-family: "Noto Sans KR", sans-serif;
        }
        #review_star_fix{
            height: 45px;
            display: flex;
            flex-direction: row;
        }
        #review_star_fix > img{
            width: 30px;
            height: 30px;
        }
        #nickname_area{
            height: 30px;
        }
    </style>
</head>
<body>
    <?php include "header.php"; ?>
    <?php  
        $login_nick = $_SESSION["usernick"];
        $nickname = $_GET["nickname"];
        $subject  = $_GET["subject"];
        $gubun    = $_GET["gubun"];
        $con = mysqli_connect("localhost", "php_project", "1234", "php_project");
        $sql = "select * from review where subject='$subject' and nickname='$nickname'";
        $result = mysqli_query($con, $sql);
        $result_row = mysqli_fetch_array($result);
        $result_subject = $result_row["subject"];
        $result_content = $result_row["content"];
        $result_star    = $result_row["star"];
        $result_gubun   = $result_row["gubun"];
        $result_content = str_replace("<br />","",$result_content);
    ?>
    <section>
        <div id="img-area">
            <img src="">
        </div>
        <form action="review_insert.php?subject=<?=$subject?>&gubun=<?=$gubun?>" id="review_insert_id" method="post">
            <div id="review_form">
                <div id="review_subject">
                    <?php
                    if($result_gubun == "PF"){
                        ?>
                        연극 제목 : <?=$result_subject?>
                        <?php
                    } else {
                        ?>
                        전시 제목 : <?=$result_subject?>
                        <?php
                    }
                    ?>
                    
                </div>
                <div id="review_star_fix">
                    <?php 
                        for($j = 0; $j < $result_star; $j++){
                            ?>
                            <img src="./img/star.png" alt="별">
                            <?php
                        }
                        for($k = $result_star; $k < 5; $k++){
                            ?>
                            <img src="./img/star_empty.png" alt="빈 별">
                            <?php
                        }
                    ?>
                </div>
                <div id="nickname_area">
                    닉네임 : <?=$nickname?>
                </div>
                <div id="review_content">
                    <textarea cols="80" rows="10" id="id_content" name="theater_content" style="color: black" disabled><?=$result_content?></textarea>
                </div>
                <div id="review_btn">
                    <?php
                    $sql = "select * from review where subject='$subject' and nickname='$login_nick'";
                    $result = mysqli_query($con, $sql);
                    $result_num = mysqli_num_rows($result);
                    if($result_num){
                        ?>
                        <button type="button" onclick="location.href='review_modify_form.php?subject=<?=$subject?>'">수정</button>
                        <?php
                    } else {
                        echo "";
                    }
                    ?>
                    <button type="button" onclick="location.href='theater_form.php'">목록</button>
                </div>
            </div>
        </form>
    </section>
    <?php include "footer.html"; ?>
</body>
</html>
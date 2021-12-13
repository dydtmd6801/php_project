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
    <script async src="./js/starRating.js"></script>
    <title>Document</title>
    <script>
        function theater_review(){
            if(document.querySelector('input[name="rating"]:checked').value == 0){
                alert("별점을 입력해주세요");
                document.querySelector('input[name="rating"]:checked').focus();
                return;
            }
            if(!document.getElementById("id_content").value){
                alert("내용을 입력해주세요");
                document.getElementById("id_content").focus();
                return;
            }
            document.getElementById("review_insert_id").submit(); 
        }
    </script>
    <style>
        section {
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
        }
        #review_subject, #review_star {
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
        #nickname_area{
            height: 30px;
        }
    </style>
</head>
<body>
    <?php include "header.php"; ?>
    <?php 
        $subject = $_GET["subject"];
        $gubun   = $_GET["gubun"];
        session_start();
        $nickname = $_SESSION["usernick"];
    ?>
    <section>
        <div id="img-area">
            <img src="">
        </div>
        <form action="review_insert.php?subject=<?=$subject?>&gubun=<?=$gubun?>" id="review_insert_id" method="post">
            <div id="review_form">
                <div id="review_subject">
                    <?php
                    if($gubun == "PF"){
                        ?>
                        연극 제목 : <?=$subject?>
                        <?php
                    } else {
                        ?>
                        전시 제목 : <?=$subject?>
                        <?php
                    }
                    ?>
                </div>
                <div id="review_star">
                    별점 : 
                    <div class="star-rating">
                        <input type="radio" id="0-stars" name="rating" value="0" checked>
                        <input type="radio" id="5-stars" name="rating" value="5" />
                        <label for="5-stars" class="star"><img src="./img/star_empty.png" class="star_img" value="5" /></label>
                        <input type="radio" id="4-stars" name="rating" value="4" />
                        <label for="4-stars" class="star"><img src="./img/star_empty.png" class="star_img"/></label>
                        <input type="radio" id="3-stars" name="rating" value="3" />
                        <label for="3-stars" class="star"><img src="./img/star_empty.png" class="star_img"/></label>
                        <input type="radio" id="2-stars" name="rating" value="2" />
                        <label for="2-stars" class="star"><img src="./img/star_empty.png" class="star_img"/></label>
                        <input type="radio" id="1-star" name="rating" value="1" />
                        <label for="1-star" class="star"><img src="./img/star_empty.png" class="star_img"/></label>
                    </div>
                </div>
                <div id="nickname_area">
                    닉네임 : <?=$nickname?>
                </div>
                <div id="review_content">
                    <textarea cols="80" rows="10" id="id_content" name="theater_content" placeholder="리뷰를 입력해 주세요!"></textarea>
                </div>
                <div id="review_btn">
                    <button type="button" onclick="theater_review()">완료</button>
                    <?php
                    if($gubun == "PF"){
                        ?>
                        <button type="button" onclick="location.href='theater_form.php'">목록</button>
                        <?php
                    } else {
                        ?>
                        <button type="button" onclick="location.href='exhibition_form.php'">목록</button>
                        <?php
                    }
                    ?>
                    
                </div>
            </div>
        </form>
    </section>
    <?php include "footer.html"; ?>
</body>
</html>
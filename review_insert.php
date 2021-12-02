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
    <style>
        .star_img{
            width: 30px;
            height: 30px;
        }
        .star_img:hover{
            filter: drop-shadow(1px 1px 4px gold);
        }
    </style>
</head>
<body>
    <?php include "header.php"; ?>
    <section>
        <form action="review_insert.php" method="post">
            <div id="review_form">
                <div id="review_subject">
                    제목 : <?php echo $_GET["subject"]; ?>
                </div>
                <div id="review_star">                    
                    <div class="star-rating">
                        <input type="radio" id="5-stars" name="rating" value="5" />
                        <label for="5-stars" class="star"><img src="./img/star_empty.png" class="star_img"/></label>
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
                <div id="review_content">
                    <textarea></textarea>
                </div>
            </div>
        </form>
    </section>
    <?php include "footer.html"; ?>
</body>
</html>
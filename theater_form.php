<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/theater.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@300;400;700&display=swap" rel="stylesheet">
    <title>Document</title>
    <script>
        function check_theater_date(){
            if(!document.getElementById("id_theater").value){
                alert("날짜를 입력해주세요!");
                document.getElementById("id_theater").focus();
                return;
            }
            document.getElementById("id_theater_form").submit();
        }
        
    </script>
</head>
<body>
    <?php include "httpPost_curl.php" ?>
    <?php include "header.php" ?>
    <div>
        <form action="theater_form.php" method="post" name="theater_form" id="id_theater_form">
            <input type="month" name="theater_date" max="" id="id_theater">
            <button type="button" onclick="check_theater_date()">조회</button>
        </form>
    </div>
    <?php
        $theater_date = $_POST["theater_date"];
        if(!$theater_date){
            $theater_date = date("Y-m");
        }
        echo "현재 조회한 날짜 : ".$theater_date."<hr>";
        $set_url = "https://dgfc.or.kr/ajax/event/list.json?event_gubun=PF&start_date=".$theater_date;
        $theater_data = httpPost("$set_url");
        $theater_data_decode = json_decode($theater_data, true);
        $theater_data_count = count($theater_data_decode);
        if($theater_data_count == 0){
            echo "데이터가 없습니다.";
        } else {
            for($i = 0; $i < $theater_data_count; $i++){
                $start_date = $theater_data_decode[$i]["start_date"];
                $end_date = $theater_data_decode[$i]["end_date"];
                $pay_gubun_name = $theater_data_decode[$i]["pay_gubun_name"];
                $subject = $theater_data_decode[$i]["subject"];
                $place = $theater_data_decode[$i]["place"];
                ?>
                <div id="theater_zone">
                    <div id="theater_img">

                    </div>
                    <div id="theater_content">
                        <p>제목 : <?=$subject?></p>
                        <?php
                        if($start_date == $end_date){
                            $total_date = $start_date;
                            ?>
                            <p>날짜 : <?=$total_date?>
                            <?php
                        } else {
                            ?>
                            <p>날짜 : <?=$start_date?> ~ <?=$end_date?></p>
                            <?php
                        }
                        ?>
                        <p>관람 유형 : <?=$pay_gubun_name?></p>
                        <p>장소 : <?=$place?></p>
                    </div>
                    <div id="theater_review">
                        <a href="review_insert">리뷰쓰기</a>
                    </div>
                </div>
                <hr>
                <?php
            }
        }
    ?>
    <?php include "footer.html" ?>
</body>
</html>
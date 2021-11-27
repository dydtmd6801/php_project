<!DOCTYPE html>
<html lang="en">
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
        echo "현재 조회한 날짜 : ".$theater_date."<br>";
        $set_url = "https://dgfc.or.kr/ajax/event/list.json?event_gubun=PF&start_date=".$theater_date;
        $theater_data = httpPost("$set_url");
        $theater_data_decode = json_decode($theater_data, true);
        $theater_data_count = count($theater_data_decode);
        if($theater_data_count == 0){
            echo "데이터가 없습니다.";
        } else {
            for($i = 0; $i < $theater_data_count; $i++){
                echo "기간 : ";
                print_r($theater_data_decode[$i]["start_date"]);
                echo " ~ ";
                print_r($theater_data_decode[$i]["end_date"]);
                echo "<br> 유료/무료 : ";
                print_r($theater_data_decode[$i]["pay_gubun_name"]);
                echo "<br> 이름 : ";
                print_r($theater_data_decode[$i]["subject"]);
                echo "<br> 장소 : ";
                print_r($theater_data_decode[$i]["place"]);
                echo "<hr>";
            }
        }
    ?>
    <?php include "footer.html" ?>
</body>
</html>
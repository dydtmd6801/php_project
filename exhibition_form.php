<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/exhibition.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@300;400;700&display=swap" rel="stylesheet">
    <title>Document</title>
    <script>
        function check_exhibition_date(){
            if(!document.getElementById("id_exhibition").value){
                alert("날짜를 입력해주세요!");
                document.getElementById("id_exhibition").focus();
                return;
            }
            document.getElementById("id_exhibition_form").submit();
        }
        
    </script>
</head>
<body>
    <?php include "httpPost_curl.php" ?>
    <?php include "header.php" ?>
    <div>
        <form action="exhibition_form.php" method="post" name="exhibition_form" id="id_exhibition_form">
            <input type="month" name="exhibition_date" max="" id="id_exhibition">
            <button type="button" onclick="check_exhibition_date()">조회</button>
        </form>
    </div>
    <?php
        $exhibition_date = $_POST["exhibition_date"];
        if(!$exhibition_date){
            $exhibition_date = date("Y-m");
        }
        echo "현재 조회한 날짜 : ".$exhibition_date."<br>";
        $set_url = "https://dgfc.or.kr/ajax/event/list.json?event_gubun=DP&start_date=".$exhibition_date;
        $exhibition_data = httpPost("$set_url");
        $exhibition_data_decode = json_decode($exhibition_data, true);
        $exhibition_data_count = count($exhibition_data_decode);
        if($exhibition_data_count == 0){
            echo "데이터가 없습니다.";
        } else {
            for($i = 0; $i < $exhibition_data_count; $i++){
                echo "기간 : ";
                print_r($exhibition_data_decode[$i]["start_date"]);
                echo " ~ ";
                print_r($exhibition_data_decode[$i]["end_date"]);
                echo "<br> 유료/무료 : ";
                print_r($exhibition_data_decode[$i]["pay_gubun_name"]);
                echo "<br> 이름 : ";
                print_r($exhibition_data_decode[$i]["subject"]);
                echo "<br> 장소 : ";
                print_r($exhibition_data_decode[$i]["place"]);
                echo "<hr>";
            }
        }
    ?>
    <?php include "footer.html" ?>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/theater_exhibition.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@300;400;700&display=swap" rel="stylesheet">
    <title>Document</title>
    <script>
        function change_section_theater(){
            document.getElementById("theater").style.visibility = "visible";
            document.getElementById("exhibition").style.visibility = "hidden";
        }
        function change_section_exhibition(){
            document.getElementById("theater").style.visibility = "hidden";
            document.getElementById("exhibition").style.visibility = "visible";
        }
    </script>
</head>
<body>
    <?php include "header.php" ?>
    <?php
        function httpPost($url) {
            $postData = '';
        
            $ch = curl_init();
        
            curl_setopt($ch,CURLOPT_URL,$url);
            curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
            curl_setopt($ch,CURLOPT_HEADER, false); 
            curl_setopt($ch, CURLOPT_POST, count($postData));
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);    
        
            $output = curl_exec($ch);
        
            curl_close($ch);
            return $output;        
        }
    ?>
    <div>
        <div id="second_container">
            <button type="button" onclick="change_section_theater()">연극 목록</button>
            <button type="button" onclick="change_section_exhibition()">전시회 목록</button>
            <div id="theater_exhibition">
                <div id="theater">
                    <form action="theater_show.php" method="post" target="empty_frame">
                        <input type="date">
                        <button type="submit">조회</button>
                    </form>
                    <?php include "theater_show.php" ?>
                </div>
                <div id="exhibition">
                    <form action="exhibition_show.php" method="post" target="empty_frame">
                        <input type="date">
                        <button type="submit">조회</button>
                    </form>
                    <?php include "exhibition_show.php" ?>
                </div>
            </div>
        </div>
    </div>
    <?php include "footer.html" ?>
    <iframe name="empty_frame" style="display:none;"></iframe>
</body>
</html>
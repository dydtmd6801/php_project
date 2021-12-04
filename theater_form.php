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
    <div class="section">
        <div>
            <form action="theater_form.php" method="post" name="theater_form" id="id_theater_form">
                <input type="month" name="theater_date" max="" id="id_theater">
                <button type="button" onclick="check_theater_date()">조회</button>
            </form>
            <?php
            $theater_date = $_POST["theater_date"];
            if(!$theater_date){
                $theater_date = date("Y-m");
            }
            echo "현재 조회한 날짜 : ".$theater_date."<hr>";
            ?>
        </div>
        <ul class="article clearfix">
        <?php
            if(isset($_GET["page"]))
                $page = $_GET["page"];
            else
                $page = 1;

            $set_url = "https://dgfc.or.kr/ajax/event/list.json?event_gubun=PF&start_date=".$theater_date;
            $theater_data = httpPost("$set_url");
            $theater_data_decode = json_decode($theater_data, true);
            $theater_data_count = count($theater_data_decode);
            while($theater_data_count%4 != 0){
                $theater_data_count = $theater_data_count + 1;
            }
            
            $list = 8;

            if($theater_data_count % $list == 0){
                $theater_page = floor($theater_data_count/$list);
            } else {
                $theater_page = floor($theater_data_count/$list) + 1;
            }

            $start = ($page - 1) * $list;

            $number = $theater_data_count - $start;

            if($theater_data_count == 0){
                echo "데이터가 없습니다.";
            } else {
                for($i = $start; $i < $start + $list && $i < $theater_data_count; $i++){
                    $start_date = $theater_data_decode[$i]["start_date"];
                    $end_date = $theater_data_decode[$i]["end_date"];
                    $pay_gubun_name = $theater_data_decode[$i]["pay_gubun_name"];
                    $subject = $theater_data_decode[$i]["subject"];
                    $place = $theater_data_decode[$i]["place"];
                    $gubun = $theater_data_decode[$i]["event_gubun"];
                    ?>
                    <?php
                    if(!$subject){
                    ?>
                        <li class="no_data_zone">
                    <?php
                    } else {
                    ?>
                        <li class="data_zone">
                    <?php
                    }
                    ?>
                    
                        <div class="poster"></div>
                        <div class="content_zone">
                            <span class="data_title">
                                <?php
                                if(!$subject){
                                    echo "";
                                } else {
                                echo $subject;
                                } 
                                ?>
                            </span>
                            <span class="data_place"><?=$place?></span>
                            <div class="bottom_menu">
                                <p class="data_date">
                                    <?php
                                    if($start_date == $end_date){
                                        $total_date = $start_date;
                                        $total_date = str_replace("-",".",$start_date)
                                        ?>
                                        <?=$total_date?>
                                        <?php
                                    } else {
                                        $start_date = str_replace("-",".",$start_date);
                                        $end_date = str_replace("-",".",$end_date);
                                        ?>
                                        <?=$start_date?> - <?=$end_date?>
                                        <?php
                                    }
                                    ?>
                                </p>
                                <?php
                                if(!$subject){
                                    echo "";
                                } else{
                                ?>
                                <p><a href="review_insert.php?subject=<?=$subject?>&gubun=<?=$gubun?>">리뷰쓰기</a></p>
                                <?php
                                }
                                ?>
                        </div>
                    </li>
                    <?php
                    $number--;
                }
            }
            ?>
            </ul>
            <ul>
            <?php
            if ($theater_page>=2 && $page >= 2)	
            {
                $new_page = $page-1;
                echo "<li><a href='theater_form.php?page=$new_page'>◀ 이전</a> </li>";
            }		
            else 
                echo "<li>&nbsp;</li>";
        
               // 게시판 목록 하단에 페이지 링크 번호 출력
               for ($i=1; $i<=$theater_page; $i++)
               {
                if ($page == $i)     // 현재 페이지 번호 링크 안함
                {
                    echo "<li><b> $i </b></li>";
                }
                else
                {
                    echo "<li><a href='theater_form.php?page=$i'> $i </a><li>";
                }
               }
               if ($theater_page>=2 && $page != $theater_page)		
               {
                $new_page = $page+1;	
                echo "<li> <a href='theater_form.php?page=$new_page'>다음 ▶</a> </li>";
            }
            else 
                echo "<li>&nbsp;</li>";
        ?>
                    </ul> <!-- page -->	    	
    </div>
    <?php include "footer.html" ?>
</body>
</html>
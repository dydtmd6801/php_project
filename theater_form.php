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
    <?php 
    header("Progma:no-cache");
    header("Cache-Control:no-cache,must-revalidate"); 
    session_cache_limiter('private_no_expire');
    $now_date = date("Y-m");
    ?>
    <?php include "httpPost_curl.php" ?>
    <?php include "header.php" ?>
    <div class="section">
        <div>
            <form action="theater_form.php" method="post" name="theater_form" id="id_theater_form" class="date_zone">
                <input type="month" name="theater_date" max="" id="id_theater" value="<?=$now_date?>">
                <button type="button" class="search_btn" onclick="check_theater_date()">조회</button>
            </form>
            <div class="api_top_info">
                <?php
                $theater_date = $_POST["theater_date"];
                if(!$theater_date){
                    $theater_date = date("Y-m");
                }
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
                ?>
                    <p>현재 조회한 날짜 : <?=$theater_date?></p>
                    <p>전체 연극 <span><?=$theater_data_count?></span>건</p>
            </div>
        </div>
        <ul class="article clearfix">
        <?php
            $list = 8;

            if($theater_data_count % $list == 0){
                $theater_page = floor($theater_data_count/$list);
            } else {
                $theater_page = floor($theater_data_count/$list) + 1;
            }

            $start = ($page - 1) * $list;
            
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
                                <p class="data_date" id="theater_date">
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
                                <p><a href="review_check_count.php?subject=<?=$subject?>&gubun=<?=$gubun?>">리뷰쓰기</a></p>
                                <?php
                                }
                                ?>
                        </div>
                    </li>
                    <?php
                }
            }
            ?>
        </ul>
        <ul class="page_num">
            <?php
            if ($theater_page>=2 && $page >= 2)	
            {
                $new_page = $page-1;
                ?>
                    <form action="theater_form.php?page=1" method="post">
                        <input type="hidden" value="<?=$theater_date?>" name="theater_date" />
                        <button type="submit" class="change_page">◀ 처음</button>
                    </form>
                    <form action="theater_form.php?page=<?=$new_page?>" method="post">
                        <input type="hidden" value="<?=$theater_date?>" name="theater_date" />
                        <button type="submit" class="change_page">◀ 이전</button>
                    </form>
                <?php
            } else
                echo "<li></li>";

                if($theater_page <= 8){
                    $show_start_page_num = 1;
                    $show_page_num = $total_page;    
                } else {
                    $show_start_page_num = 1;
                    $show_page_num = 8;
                }

                if ($page < $show_page_num && $page >= $show_start_page_num){
                    $show_start_page_num = $show_start_page_num;
                    $show_page_num = $show_page_num;
                } else if($page > $show_page_num){
                    $show_start_page_num += $page - $show_page_num;
                    $show_page_num += $page - $show_page_num;
                }
                for ($i = $show_start_page_num; $i <= $show_page_num; $i++){
                    if ($page == $i) {
                        ?>
                            <form>
                                <button class="no_selected_page" disabled><?=$i?></button>
                            </form>
                        <?php
                    } else {
                        ?>
                            <form action="theater_form.php?page=<?=$i?>" method="post">
                                    <input type="hidden" value="<?=$theater_date?>" name="theater_date" />
                                    <button type="submit" class="selected_page"><?=$i?></button>
                            </form>
                        <?php
                    }
                }
                if ($theater_page>=2 && $page != $theater_page){
                    $new_page = $page+1;
                    ?>
                    <form action="theater_form.php?page=<?=$new_page?>" method="post">
                        <input type="hidden" value="<?=$theater_date?>" name="theater_date" />
                        <button type="submit" class="change_page">다음 ▶</button>
                    </form>
                    <form action="theater_form.php?page=<?=$theater_page?>" method="post">
                        <input type="hidden" value="<?=$theater_date?>" name="theater_date" />
                        <button type="submit" class="change_page">마지막 ▶</button>
                    </form>
                    <?php
                } else 
                    echo "<li></li>";
            ?>
        </ul>	    	
    </div>
    <?php include "footer.html" ?>
</body>
</html>
<!DOCTYPE html>
<html lang="ko">
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
    <?php 
    header("Progma:no-cache");
    header("Cache-Control:no-cache,must-revalidate"); 
    session_cache_limiter('private_no_expire');
    ?>
    <?php include "httpPost_curl.php" ?>
    <?php include "header.php" ?>
    <div class="section">
        <div>
            <form action="exhibition_form.php" method="post" name="exhibition_form" id="id_exhibition_form">
                <input type="month" name="exhibition_date" max="" id="id_exhibition">
                <button type="button" onclick="check_exhibition_date()">조회</button>
            </form>
            <?php
            $exhibition_date = $_POST["exhibition_date"];
            if(!$exhibition_date){
                $exhibition_date = date("Y-m");
            }
            echo "현재 조회한 날짜 : ".$exhibition_date."<hr>";
            ?>
        </div>
        <ul class="article clearfix">
        <?php
            if(isset($_GET["page"]))
                $page = $_GET["page"];
            else
                $page = 1;

            $set_url = "https://dgfc.or.kr/ajax/event/list.json?event_gubun=DP&start_date=".$exhibition_date;
            $exhibition_data = httpPost("$set_url");
            $exhibition_data_decode = json_decode($exhibition_data, true);
            $exhibition_data_count = count($exhibition_data_decode);
            while($exhibition_data_count%4 != 0){
                $exhibition_data_count = $exhibition_data_count + 1;
            }
            
            $list = 8;

            if($exhibition_data_count % $list == 0){
                $exhibition_page = floor($exhibition_data_count/$list);
            } else {
                $exhibition_page = floor($exhibition_data_count/$list) + 1;
            }

            $start = ($page - 1) * $list;
            
            if($exhibition_data_count == 0){
                echo "데이터가 없습니다.";
            } else {
                for($i = $start; $i < $start + $list && $i < $exhibition_data_count; $i++){
                    $start_date = $exhibition_data_decode[$i]["start_date"];
                    $end_date = $exhibition_data_decode[$i]["end_date"];
                    $pay_gubun_name = $exhibition_data_decode[$i]["pay_gubun_name"];
                    $subject = $exhibition_data_decode[$i]["subject"];
                    $place = $exhibition_data_decode[$i]["place"];
                    $gubun = $exhibition_data_decode[$i]["event_gubun"];
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
                if ($exhibition_page>=2 && $page >= 2)	
                {
                    $new_page = $page-1;
                    ?>
                        <form action="exhibition_form.php?page=1" method="post">
                            <input type="hidden" value="<?=$exhibition_date?>" name="exhibition_date" />
                            <button type="submit" class="change_page">◀ 처음</button>
                        </form>
                        <form action="exhibition_form.php?page=<?=$new_page?>" method="post">
                            <input type="hidden" value="<?=$exhibition_date?>" name="exhibition_date" />
                            <button type="submit" class="change_page">◀ 이전</button>
                        </form>
                    <?php
                } else
                    echo "<li></li>";
            
                    if($exhibition_page <= 8){
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
                                <form action="exhibition_form.php?page=<?=$i?>" method="post">
                                        <input type="hidden" value="<?=$exhibition_date?>" name="exhibition_date" />
                                        <button type="submit" class="selected_page"><?=$i?></button>
                                </form>
                            <?php
                        }
                    }
                    if ($exhibition_page>=2 && $page != $exhibition_page){
                        $new_page = $page+1;
                        ?>
                        <form action="exhibition_form.php?page=<?=$new_page?>" method="post">
                            <input type="hidden" value="<?=$exhibition_date?>" name="exhibition_date" />
                            <button type="submit" class="change_page">다음 ▶</button>
                        </form>
                        <form action="exhibition_form.php?page=<?=$exhibition_page?>" method="post">
                            <input type="hidden" value="<?=$exhibition_date?>" name="exhibition_date" />
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
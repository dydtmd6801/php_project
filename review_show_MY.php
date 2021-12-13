<?php
    session_start();
    if (isset($_SESSION["userid"])){ 
        $userid = $_SESSION["userid"];
    } else{ 
        $userid = "";
        echo "
            <script>
                alert('로그인을 해주세요!');
                location.href='review_show.php';
            </script>
             ";
    }
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/footer.css">
    <?php
        $con = mysqli_connect("localhost", "php_project", "1234", "php_project");
        $sql = "select * from review where id='$userid'";
        $review_cnt = mysqli_num_rows(mysqli_query($con, $sql));
        if(!$review_cnt){
            ?>
            <link rel='stylesheet' href='./css/no_scroll.css'>
            <?php
        } else {
        }
    ?>
    <link rel="stylesheet" href="./css/starRating.css">
    <link rel="stylesheet" href="./css/review_show.css">
    <title>나의 리뷰보기</title>
    <script>
        function change_img(){
            console.log("test");
        }
    </script>
</head>
<body>
    <?php include "header.php"; ?>
   	<div class="section">
       <div>
            <div class="review-top-menu">
                <a href="review_show.php">전체 리뷰</a>
                <a href="review_show_PF.php">연극 리뷰</a>
                <a href="review_show_DP.php">전시 리뷰</a>
                <a style="color: purple; text-decoration: underline;">내가 쓴 리뷰</a>
            </div>
            
            <div class="result_text">나의 리뷰 <span><?=$review_cnt?></span>건</div>
        </div>
	    <ul class="article clearfix">
            <?php
                session_start();
                $login_nick = $_SESSION["usernick"];
                if(!$review_cnt){
                    echo "데이터가 없습니다.";
                }
                else {
                    if (isset($_GET["page"]))
                    $page = $_GET["page"];
                else
                    $page = 1;

                $sql = "select * from review where id='$userid' order by num desc";
                $result = mysqli_query($con, $sql);
                $total_record = mysqli_num_rows($result); 
                while($total_record%4 != 0){
                    $total_record = $total_record + 1;
                }

                $scale = 8;

                if ($total_record % $scale == 0)     
                    $total_page = floor($total_record/$scale);      
                else
                    $total_page = floor($total_record/$scale) + 1; 

                $start = ($page - 1) * $scale;

            for ($i=$start; $i<$start+$scale && $i < $total_record; $i++)
            {
                mysqli_data_seek($result, $i); 
                $row = mysqli_fetch_array($result); 
                $num        = $row["num"];
                $id         = $row["id"];
                $name       = $row["name"];
                $subject    = $row["subject"];
                $regist_day = $row["regist_day"];
                $regist_day = date("Y-m-d", strtotime($regist_day));
                $nickname   = $row["nickname"];
                $content    = $row["content"];
                $star       = $row["star"];
                $gubun      = $row["gubun"];
                ?>
                <?php
                if(!$subject){
                ?>
                    <li class="no_data_zone"></li>
                <?php
                } else {
                ?>
                    <li class="data_zone">
                        <div class="star_area">
                        <div>
                            <?php 
                            for($j = 0; $j < $star; $j++){
                                ?>
                                <img src="./img/star.png" alt="별">
                                <?php
                            }
                            for($k = $star; $k < 5; $k++){
                                ?>
                                <img src="./img/star_empty.png" alt="빈 별">
                                <?php
                            }
                            ?>
                            </div>
                            <div>
                            <?php
                            $heart_check_sql = "select * from like_cnt where nickname='$login_nick' and review_num=$num and gubun='$gubun'";
                            $heart_check_sql_result_num = mysqli_num_rows(mysqli_query($con, $heart_check_sql));
                            if(!$heart_check_sql_result_num){
                                ?>
                                <img src="./img/heart_empty.png" onclick="location.href='like_up.php?num=<?=$num?>&gubun=<?=$gubun?>&page=<?=$page?>&goPage=\'my\''">
                                <?php
                            } else {
                            ?>
                                <img src="./img/heart.png" onclick="location.href='like_up.php?num=<?=$num?>&gubun=<?=$gubun?>&page=<?=$page?>&goPage=\'my\''">
                            <?php
                            }
                            ?>
                            </div>
                        </div>
                        <div class="review_title"><?=$subject?></div>
                        <div class="review_content"><?=$content?></div>
                        <div class="review_regi_day"><?=$regist_day?></div>
                        <div class="review_sub_content">
                            <span><a href="review_show_detail.php?subject=<?=$subject?>&nickname=<?=$nickname?>">상세보기</a></span>
                            <span>
                                <?php
                                if($gubun == "DP"){
                                    echo "전시";
                                }
                                if($gubun == "PF"){
                                    echo "연극";
                                }
                                ?>
                            </span>
                        </div>
                    </li>
                <?php
                }
            }
        }
        mysqli_close($con);
        ?>      
        </ul>
        <ul class="page_num">
            <?php
            if ($total_page>=2 && $page >= 2)	
            {
                $new_page = $page-1;
                ?>
                    <form action="review_show_MY.php?page=1" method="post">
                        <button type="submit" class="change_page">◀ 처음</button>
                    </form>
                    <form action="review_show_MY.php?page=<?=$new_page?>" method="post">
                        <button type="submit" class="change_page">◀ 이전</button>
                    </form>
                <?php
            } else
                echo "<li></li>";

                if($total_page <= 8){
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
                            <form action="review_show_MY.php?page=<?=$i?>" method="post">
                                <button type="submit" class="selected_page"><?=$i?></button>
                            </form>
                        <?php
                    }
                }
                if ($total_page>=2 && $page != $total_page){
                    $new_page = $page+1;
                    ?>
                    <form action="review_show_MY.php?page=<?=$new_page?>" method="post">
                        <button type="submit" class="change_page">다음 ▶</button>
                    </form>
                    <form action="review_show_MY.php?page=<?=$total_page?>" method="post">
                        <input type="hidden" value="<?=$total_page?>" name="total_page" />
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
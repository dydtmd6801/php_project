<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/starRating.css">
    <link rel="stylesheet" href="./css/review_show.css">
    <title>Document</title>
    <script>
        function change_img(){
            console.log("test");
        }
    </script>
</head>
<body>
    <?php include "header.php"; ?>
   	<div class="section">
	    <ul class="article clearfix">
            <?php
                if (isset($_GET["page"]))
                    $page = $_GET["page"];
                else
                    $page = 1;

                $con = mysqli_connect("localhost", "php_project", "1234", "php_project");
                $sql = "select * from review order by num desc";
                $result = mysqli_query($con, $sql);
                $total_record = mysqli_num_rows($result); // 전체 글 수
                while($total_record%4 != 0){
                    $total_record = $total_record + 1;
                }

                $scale = 8;

                // 전체 페이지 수($total_page) 계산 
                if ($total_record % $scale == 0)     
                    $total_page = floor($total_record/$scale);      
                else
                    $total_page = floor($total_record/$scale) + 1; 

                // 표시할 페이지($page)에 따라 $start 계산  
                $start = ($page - 1) * $scale;

            for ($i=$start; $i<$start+$scale && $i < $total_record; $i++)
            {
                mysqli_data_seek($result, $i);
                // 가져올 레코드로 위치(포인터) 이동
                $row = mysqli_fetch_array($result);
                // 하나의 레코드 가져오기
                $num        = $row["num"];
                $id         = $row["id"];
                $name       = $row["name"];
                $subject    = $row["subject"];
                $regist_day = $row["regist_day"];
                $regist_day = date("Y-m-d", $regist_day);
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
                        <div style="height: 45px;">별점 <?=$star?></div>
                        <div style="flex: 1">제목 <?=$subject?></div>
                        <div style="flex: 4">내용 <?=$content?></div>
                        <div style="flex: 1"><?=$nickname?><?=$regist_day?><?=$gubun?></div>
                    </li>
                <?php
                }
            }
        mysqli_close($con);
        ?>
        </ul>
        <ul id="page_num"> 	
            <?php
                if ($total_page>=2 && $page >= 2)	
                {
                    $new_page = $page-1;
                    echo "<li><a href='board_list.php?page=$new_page'>◀ 이전</a> </li>";
                }		
                else 
                    echo "<li></li>";

                // 게시판 목록 하단에 페이지 링크 번호 출력
                for ($i=1; $i<=$total_page; $i++)
                {
                    if ($page == $i)     // 현재 페이지 번호 링크 안함
                    {
                        echo "<li><b> $i </b></li>";
                    }
                    else
                    {
                        echo "<li><a href='board_list.php?page=$i'> $i </a><li>";
                    }
                }
                if ($total_page>=2 && $page != $total_page)		
                {
                    $new_page = $page+1;
                    echo "<li> <a href='board_list.php?page=$new_page'>다음 ▶</a> </li>";
                }
                else 
                    echo "<li></li>";
            ?>
        </ul>
    </div>
    <?php include "footer.html" ?>
</body>
</html>
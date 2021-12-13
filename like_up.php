<?php
session_start();
if (isset($_SESSION["userid"])){ 
    $userid = $_SESSION["userid"];
    
    $page = $_GET["page"];
    $goPage = $_GET["goPage"];
    $review_code = $_GET["num"];
    $gubun = $_GET["gubun"];
    $userid = $_SESSION["userid"];
    $usernick = $_SESSION["usernick"];

    $con = mysqli_connect("localhost", "php_project", "1234", "php_project");

    $like_count_sql = "select * from review where num=$review_code and gubun='$gubun'";
    $result = mysqli_query($con, $like_count_sql);
    $like_result_row = mysqli_fetch_array($result);
    (int)$like_count = $like_result_row["like_num"];

    $sql = "select * from like_cnt where id='$userid' and review_num='$review_code'";
    $result = mysqli_query($con, $sql);
    $result_num = mysqli_num_rows($result);
    if($result_num){
        $sql = "delete from like_cnt where id='$userid' and review_num='$review_code'";
        mysqli_query($con, $sql);
        $like_count = $like_count - 1;
        $sql = "update review set like_num=$like_count where num=$review_code";
        mysqli_query($con, $sql);
    }else{
        $sql = "insert into like_cnt (id, nickname, review_num, like_count, gubun) values ('$userid', '$usernick', '$review_code', '1', '$gubun')";
        mysqli_query($con, $sql);
        $like_count = $like_count + 1;
        $sql = "update review set like_num=$like_count where num=$review_code";
        mysqli_query($con, $sql);
    }
    // $go_url = "";
    switch($goPage){
        case "'all'":
            $go_url = "location.href='review_show.php?page=$page';";
            break;
        case "'my'":
            $go_url = "location.href='review_show_MY.php?page=$page';";
            break;
        case "'pf'":
            $go_url = "location.href='review_show_PF.php?page=$page';";
            break;
        case "'dp'":
            $go_url = "location.href='review_show_DP.php?page=$page';";
            break;
    }
    echo    "
            <script>
                $go_url
            </script>
            ";
} else{
    $userid = "";
    echo "
        <script>
            alert('로그인을 해주세요!');
            history.go(-1);
        </script>
         ";
}
?>
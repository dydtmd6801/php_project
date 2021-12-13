<?php
session_start();
if (isset($_SESSION["userid"])){ 
    $userid = $_SESSION["userid"];

    $review_code = $_GET["num"];
    $gubun = $_GET["gubun"];
    $userid = $_SESSION["userid"];
    $usernick = $_SESSION["usernick"];

    $con = mysqli_connect("localhost", "php_project", "1234", "php_project");

    $like_count_sql = "select * from review where num=$review_code";
    $result = mysqli_query($con, $like_count_sql);

    $sql = "select * from like_cnt where id='$userid' and review_num='$review_code'";
    $result = mysqli_query($con, $sql);
    $result_num = mysqli_num_rows($result);
    if($result_num){
        $sql = "delete from like_cnt where id='$userid' and review_num='$review_code'";
        mysqli_query($con, $sql);
    }else{
        $sql = "insert into like_cnt (id, nickname, review_num, like_count, gubun) values ('$userid', '$usernick', '$review_code', '1', '$gubun')";
        mysqli_query($con, $sql);
        $like_cnt += 1;
        echo "like : ".$like_cnt;
        $sql = "update review set like_num=$like_cnt where num=$review_code";
        mysqli_query($con, $sql);
    }
    echo    "
                <script>
                    history.go(-1);
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
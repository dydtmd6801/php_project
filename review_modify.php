<?php
    date_default_timezone_set("Asia/Seoul");
    session_start();
    if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
    else $userid = "";
    if (isset($_SESSION["username"])) $username = $_SESSION["username"];
    else $username = "";
    if (isset($_SESSION["usernick"])) $usernick = $_SESSION["usernick"];
    else $usernick = "";

    if (!$userid)
    {
        echo "
                <script>
                    alert('로그인후 리뷰를 써 주세요');
                    history.go(-1)
                </script>
        ";
        exit;
    }

    $subject = $_GET["subject"];
    $gubun   = $_GET["gubun"];
    $rating  = $_POST["rating"];
    $content = $_POST["theater_content"];

    $subject = str_replace("'", "\'", $subject);
	$content = htmlspecialchars($content, ENT_QUOTES);
    $content = nl2br($content);

	$regist_day = date("Y-m-d H:i:s");

	$con = mysqli_connect("localhost", "php_project", "1234", "php_project");
    $sql = "update review set star='$rating', content='$content' where subject='$subject' and id='$userid'";
    mysqli_query($con, $sql);

    mysqli_close($con);
    echo "
         <script>
             location.href = 'review_show.php';
         </script>
         ";
?>
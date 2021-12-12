<?php
    session_start();
    if (isset($_SESSION["userid"])){ 
        $userid = $_SESSION["userid"];
    } else{ 
        $userid = "";
        echo "
            <script>
                alert('로그인을 해주세요!');
                location.href='index.php';
            </script>
             ";
    }

    $gubun = $_GET["gubun"];
    $subject = $_GET["subject"];

    $con = mysqli_connect("localhost", "php_project", "1234", "php_project");
    $sql = "select * from review where id='$userid' and subject=\"$subject\"";
    $result_check = mysqli_num_rows(mysqli_query($con, $sql));
    echo $result_check;
    echo $userid;
    echo $subject;
    echo $sql;

    if(!$result_check){
            ?>
            <form action="review_form.php" method="post" name="go_review_form">
                <input type="hidden" name="subject" value="<?=$subject?>">
                <input type="hidden" name="gubun" value="<?=$gubun?>">
            </form>
            <script>
                document.go_review_form.submit();
            </script>
            <?php
    } else {
        echo    "
                <script>
                    alert('1인 1리뷰만 가능합니다!');
                    history.go(-1);
                </script>
                ";
    }
?>
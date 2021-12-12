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
    echo "1:".$result_check."<br>";
    echo ",2:".$userid."<br>";
    echo ",3:".$gubun."<br>";
    echo ",4:".$subject."<br>";
    echo ",5:".$sql."<br>";

    if(!$result_check){
        echo    "
                <script>
                    location.href=\"review_form.php?gubun=$gubun&subject=$subject\";
                </script>
                ";
    } else {
        echo    "
                <script>
                    alert('1인 1리뷰만 가능합니다!');
                    history.go(-1);
                </script>
                ";
    }
?>
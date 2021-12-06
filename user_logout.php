<?php
    session_start();
    if (isset($_SESSION["userid"])){ 
        $userid = $_SESSION["userid"];
    } else{ 
        $userid = "";
    };
    unset($_SESSION["userid"]);
    echo    "
            <script>
                alert('로그아웃 되었습니다');
                location.href='index.php';
            </script>
            ";
?>
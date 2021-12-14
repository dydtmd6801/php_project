<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/admin_page.css">
    <title>Document</title>
    <script>
        function rm_id_check(rm_id_data){
            var rm_check = confirm("유저를 삭제하시겠습니까?");
            if(rm_check == true){
                location.href='admin_user_delete.php?id=' + rm_id_data;
            }
        }
        var check_true = 0;
        var check_str = "";
        function all_checkbox(check_cnt){
            if(document.getElementById("all_check").checked == true){
                for(var i = 0; i < check_cnt; i++){
                    document.getElementsByClassName("check_func")[i].checked = true;
                }
                check_true = check_cnt;
            }
            if(document.getElementById("all_check").checked == false){
                for(var i = 0; i < check_cnt; i++){
                    document.getElementsByClassName("check_func")[i].checked = false;
                }
                check_true = 0;
            }
            
        }
        function check_count(id_value){
            id_value = id_value + ",";
            if(document.getElementsByClassName("check_func")[0].checked == true){
                check_true++;
                check_str += id_value;
            }
            if(document.getElementsByClassName("check_func")[0].checked == false){
                check_true--;
                check_str -= id_value;
            }
        }
        function check_delete(check_num, id_value){
            location.href="admin_user_check_delete.php?check=" + check_true + "&check_str='" + check_str + "'";
        }
    </script>
</head>
<body>
    <?php
    $con = mysqli_connect("localhost", "php_project", "1234", "php_project");
    $sql = "select * from user order by num desc";
    $result = mysqli_query($con, $sql);
    $number = mysqli_num_rows($result);
    $static_number = mysqli_num_rows($result);
    ?>
    <section>
        <nav>
            <p>Dragon Review</p>
            <span><a href="admin_page.php">멤버 관리</a></span>
        </nav>
        <article>
            <div><a href="user_logout.php">로그아웃</a></div>
            <div>
                <p>멤버 관리</p>
                <ul>
                    <li class="admin_subject">
                        <span><input type="checkbox" onclick="all_checkbox(<?=$number?>)" id="all_check"></span>
                        <span>번호</span>
                        <span>아이디</span>
                        <span>이름</span>
                        <span>닉네임</span>
                        <span>이메일</span>
                        <span>레벨</span>
                        <span></span>
                        <span></span>
                    </li>
                    <?php
                        $del_user_num = "";
                        while($result_row = mysqli_fetch_array($result)){
                            $num      = $result_row["num"];
                            $id       = $result_row["id"];
                            $name     = $result_row["name"];
                            $nickname = $result_row["nickname"];
                            $email    = $result_row["email"];
                            $level    = $result_row["level"];
                            ?>
                            <li class="admin_search">
                                <form action="admin_user_modify.php?id=<?=$id?>" method="post" name="test" id="admin_form">
                                    <span><input type="checkbox" class="check_func" onclick="check_count('<?=$id?>')"></span>
                                    <span><?=$number?></span>
                                    <span><?=$id?></span>
                                    <span><input type="text" id="<?=$id.'_name'?>" name="admin_form_name" value="<?=$name?>"></span>
                                    <span><?=$nickname?></span>
                                    <span><input type="text" id="<?=$id.'_email'?>" name="admin_form_email" value="<?=$email?>"></span>
                                    <span><input type="number" max="2" min="1" id="<?=$id.'_level'?>" name="admin_form_level" value="<?=$level?>"></span>
                                    <span><button type="submit">수정</button></span>
                                    <span><button type="button" onclick="rm_id_check('<?=$id?>')">삭제</button></span>
                                </form>
                            </li>
                            <?php
                            $number--;
                        }
                    ?>
                </ul>
                <div class="check_del">
                    <button type="button" onclick="check_delete(<?=$static_number?>, '<?=$id?>')">선택한 유저 삭제</button>
                </div>
            </div>
        </article>
    </section>
</body>
</html>
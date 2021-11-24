function check_login(){
    var id_value = document.getElementById("id_value");
    var pw_value = document.getElementById("pw_value");
    
    if(!id_value.value){
        alert("아이디를 입력하세요!");
        id_value.focus();
        return;
    }

    if(!pw_value.value){
        alert("비밀번호를 입력하세요!");
        pw_value.focus();
        return;
    }
    document.getElementById("id_login_check").submit();
}
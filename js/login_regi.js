function whiteSpaceCheck(target) {
    var whiteSpace = /\s/;
    if(target.match(whiteSpace)) {
        alert("공백을 제거해주세요!");
    }
    return 1;
}
function check_login_data(){
    if(whiteSpaceCheck(document.getElementById("login_id").value) === 1 || whiteSpaceCheck(document.getElementById("login_pw").value) === 1){
        return;
    }
    if(!document.getElementById("login_id").value){
        alert("아이디를 입력해주세요!");
        document.getElementById("login_id").focus();
        return;
    }
    if(!document.getElementById("login_pw").value){
        alert("비밀번호를 입력해주세요!");
        document.getElementById("login_pw").focus();
        return;
    }
    document.getElementById("login-form-id").submit();
}
function check_regi_data(){
    if( whiteSpaceCheck(document.getElementById("regi_id").value) === 1 ||
        whiteSpaceCheck(document.getElementById("regi_pw").value) === 1 ||
        whiteSpaceCheck(document.getElementById("regi_pw_check").value) === 1 ||
        whiteSpaceCheck(document.getElementById("regi_name").value) === 1 ||
        whiteSpaceCheck(document.getElementById("regi_nickname").value) === 1 ||
        whiteSpaceCheck(document.getElementById("regi_email").value) === 1){
        return;
    }
    if(!document.getElementById("regi_id").value){
        alert("아이디를 입력해주세요!");
        document.getElementById("regi_id").focus();
        return;
    }
    if(!document.getElementById("regi_pw").value){
        alert("비밀번호를 입력해주세요!");
        document.getElementById("regi_pw").focus();
        return;
    }
    if(!document.getElementById("regi_pw_check").value){
        alert("비밀번호 확인을 입력해주세요!");
        document.getElementById("regi_pw_check").focus();
        return;
    }
    if(!document.getElementById("regi_name").value){
        alert("이름을 입력해주세요!");
        document.getElementById("regi_name").focus();
        return;
    }
    if(!document.getElementById("regi_nickname").value){
        alert("별명을 입력해주세요!");
        document.getElementById("regi_nickname").focus();
        return;
    }
    if(!document.getElementById("regi_email").value){
        alert("이메일을 입력해주세요!");
        document.getElementById("regi_email").focus();
        return;
    }
    if(document.getElementById("regi_pw").value != document.getElementById("regi_pw_check").value){
        alert("비밀번호가 맞지 않습니다!");
        document.getElementById("regi_pw").focus();
        return;
    }
    document.getElementById("register-form-id").submit();
}
function check_register_id(){
    if(whiteSpaceCheck(document.getElementById("regi_id").value) === 1){
        return;
    }
    if(!document.getElementById("regi_id").value){
        alert("아이디를 입력해주세요!");
        document.getElementById("regi_id").focus();
        return;
    }
    window.open("register_check_id.php?id="+document.getElementById("regi_id").value, "check_id", "width=500, height=200");
}
function check_register_nick(){
    if(whiteSpaceCheck(document.getElementById("regi_name").value) === 1){
        return;
    }
    if(!document.getElementById("regi_nickname").value){
        alert("닉네임을 입력해주세요!");
        document.getElementById("regi_nickname").focus();
        return;
    }
    window.open("register_check_nick.php?nick="+document.getElementById("regi_nickname").value, "check_nick", "width=500, height=200");
}
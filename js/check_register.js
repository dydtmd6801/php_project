function check_register_form(){
    var id_value = document.getElementById("id_value").value;
    var pw_value = document.getElementById("pw_value").value;
    var check_pw_value = document.getElementById("check_pw_value").value;
    var name_value = document.getElementById("name_value").value;
    var nick_value = document.getElementById("nick_value").value;
    var email_value = document.getElementById("email_value").value;
    var domain_value_check = document.getElementById("id_domain").value;
    var domain_value;
    if(domain_value_check == "no"){
        domain_value = document.getElementById("domain_value").value;
        console.log(domain_value);
    }
    console.log(id_value);
    if(!id_value){
        alert("아이디를 입력하세요!");
        document.getElementById("id_value").focus();
        return;
    }
    if(!pw_value){
        alert("비밀번호를 입력하세요!");
        document.getElementById("pw_value").focus();
        return;
    }
    if(!check_pw_value){
        alert("비밀번호 확인을 입력하세요!");
        document.getElementById("check_pw_value").focus();
        return;
    }
    if(!name_value){
        alert("이름을 입력하세요!");
        document.getElementById("name_value").focus();
        return;
    }
    if(!nick_value){
        alert("닉네임을 입력하세요!");
        document.getElementById("nick_value").focus();
        return;
    }
    if(!email_value){
        alert("이메일을 입력하세요!");
        document.getElementById("email_value").focus();
        return;
    }
    if(domain_value_check == "no"){
        if(!domain_value){
            alert("주소를 입력하세요!");
            document.getElementById("domain_value").focus();
            return;
        }
    }
    if(pw_value != check_pw_value){
        alert("비밀번호가 일치하지않습니다.\n 다시 입력해 주세요.");
        document.getElementById("pw_value").focus();
        document.getElementById("pw_value").select();
        return;
    }
    document.getElementById("register_form").submit();
}

function show_input(){
    var select_value = document.getElementById("id_domain");
    var html_code = "<input type='text' name='data_domain_direct' id='domain_value' value=''>";

    if(select_value.value == "no"){
        document.getElementById("direct").innerHTML = html_code;
    }
}
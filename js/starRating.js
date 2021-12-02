var star5 = document.getElementsByClassName('star_img')[0];
var star4 = document.getElementsByClassName('star_img')[1];
var star3 = document.getElementsByClassName('star_img')[2];
var star2 = document.getElementsByClassName('star_img')[3];
var star1 = document.getElementsByClassName('star_img')[4];

function change_img(show_cnt, cla_value, img_src_fill, img_src_empty){
    for(var i = 5 - show_cnt; i < 5; i++){
        document.getElementsByClassName(cla_value)[i].src=img_src_fill;
    }
    for(var i = 0; i < 5 - show_cnt; i++){
        document.getElementsByClassName(cla_value)[i].src=img_src_empty;
    }
}

function check_star(check_url){
    if(check_url == "http://192.168.244.128/php_project/img/star_empty.png"){
        return false;
    } else {
        return true;
    }
}

star5.addEventListener('click', (e)=>{select_img(5)});
star4.addEventListener('click', (e)=>{select_img(4)});
star3.addEventListener('click', (e)=>{select_img(3)});
star2.addEventListener('click', (e)=>{select_img(2)});
star1.addEventListener('click', (e)=>{select_img(1)});
function select_img(star_cnt){
    var img_src_fill = "./img/star.png";
    var img_src_empty = "./img/star_empty.png";
    var cla_value = "star_img";
    var check_star5 = check_star(star5.src);
    var check_star4 = check_star(star4.src);
    var check_star3 = check_star(star3.src);
    var check_star2 = check_star(star2.src);
    switch(star_cnt){
        case 1:
            if(check_star5 == false && check_star4 == false && check_star3 == false && check_star2 == false){
                if(star1.src == "http://192.168.244.128/php_project/img/star.png"){
                    img_src_fill = "./img/star_empty.png";
                }
            }
            change_img(1, cla_value, img_src_fill, img_src_empty);
            break;
        case 2:
            change_img(2, cla_value, img_src_fill, img_src_empty);
            break;
        case 3:
            change_img(3, cla_value, img_src_fill, img_src_empty);
            break;
        case 4:
            change_img(4, cla_value, img_src_fill, img_src_empty);
            break;
        case 5:
            change_img(5, cla_value, img_src_fill, img_src_empty);
            break;
    }
}

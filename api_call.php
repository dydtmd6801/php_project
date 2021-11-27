<?php
// $op_id = $_GET["op_id"];

function httpPost($url)
{
    $postData = '';

    $ch = curl_init();
 
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_HEADER, false); 
    curl_setopt($ch, CURLOPT_POST, count($postData));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);    
 
    $output = curl_exec($ch);
 
    curl_close($ch);
    return $output;
 
}

$theater_data = httpPost("https://dgfc.or.kr/ajax/event/list.json?event_gubun=PF&start_date=2021-07");
$theater_data_decode = json_decode($theater_data);
print_r($theater_data_decode);
?>
<?php
$theater_data = httpPost("https://dgfc.or.kr/ajax/event/list.json?event_gubun=DP&start_date=2021-07");
$theater_data_decode = json_decode($theater_data, true);
print_r($theater_data_decode[0]);
?>
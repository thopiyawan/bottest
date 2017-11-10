<?php

$ch = curl_init();
// Disable SSL verification
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
// Will return the response, if false it print the response
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// Set the url
curl_setopt($ch, CURLOPT_URL,"http://bottest14.herokuapp.com/run.php?id=U2dc636d2cd052e82c29f5284e00f69b9" );
// Execute
$result=curl_exec($ch);
// Closing
curl_close($ch);
// แปลงข้อมูลที่รับมาในรูป json มาเป็น array จะได้ใช้ง่าย ๆ
$DATA= json_decode($result, true);
// //dump ข้อมูลออกมาดู
print_r($DATA);

?>
<?php 


$cachedir='cache'; // ชื่อแฟ้มเก็บไฟล์แคช 777 ด้วยนะ
$file='index.php'; // ชื่อไฟล์ที่จะเก็บ
$cachefile=$cachedir.'/'.$file;
$cachetime =60;  // ระยะเวลา 1 วัน
if (file_exists($cachefile) && (time() - $cachetime < filemtime($cachefile))) {
include($cachefile);
}else{
//ใส่ไฟล์ที่ต้องการรัน include() ไฟล์เข้ามาเลยก็ได้
$fp = fopen($cachefile, 'w');
fwrite($fp, ob_get_contents()); 
fclose($fp);
ob_end_flush();
}



?>

<?php
//query user id from userdata

//database
// $conn_string = "host=ec2-54-163-233-201.compute-1.amazonaws.com port=5432 dbname=dchdrsngrf50pd user=njppbbukwreesq password=c6b890bd6e0dccc4a5db3308869ba5e2735fe0e5df7a3f0de6f114cc24752e04";
// $dbconn = pg_pconnect($conn_string);
// //

$access_token = 'jAhOdFXCh/DvBKGKzGH9gdl2io1agIcbwZMjIvu3zfHb+9Y+m9e+7GSKGf+rBHBp0IpGRLuT6W1wLOJSWQFAlnHT/KbDBpdpyDU4VTUdY6plmLgUjnHL5s6zcq9+GM/YaFBrun+Y9zkrs4NqvbemoQdB04t89/1O/w1cDnyilFU=';

// $content = file_get_contents('php://input');
// // Parse JSON
// $events = json_decode($content, true);



// $curr_years = date("Y");
// $curr_y = ($curr_years+ 543);


// $_msg = $events['events'][0]['message']['text'];
// $user = $events['events'][0]['source']['userId'];
// $user_id = pg_escape_string($user);



// $check_q = pg_query($dbconn,"SELECT seqcode, sender_id ,updated_at  FROM sequentsteps  WHERE sender_id = '{$user_id}'  order by updated_at desc limit 1   ");
//                 while ($row = pg_fetch_row($check_q)) {
//                   echo $seqcode =  $row[0];
//                   echo $sender = $row[2]; 
//                 } 
// //****************ทดสอบ
//        $d = date("D");
//        $h = date("H:i");
// //****************ทดสอบ จบ




// //*********//
// //query data , 

 

//     $check_q = pg_query($dbconn,"SELECT  user_age, user_weight ,user_height ,preg_week  FROM user_data WHERE  user_id = '{$user_id}' ");

//                 while ($row = pg_fetch_row($check_q)) {
//                   echo $answer1 = $row[0]; 
//                   echo $weight = $row[1]; 
//                   echo $height = $row[2]; 
//                   echo $answer4 = $row[3]+1;  
//                 } 
          

//                     $replyToken = $event['replyToken'];
//                     $messages2 = [
//                         'type' => 'text',
//                         'text' => 'คุณมีอายุครรภ์'.$answer4.'สัปดาห์'
//                       ];
    
//                     $messages3 = [
                                                              
//                                   'type' => 'template',
//                                   'altText' => 'template',
//                                   'template' => [
//                                       'type' => 'buttons',
//                                       'thumbnailImageUrl' => 'https://bottest14.herokuapp.com/week/'.$answer4 .'.jpg',
//                                       'title' => 'ลูกน้อยของคุณ',
//                                       'text' =>  'อายุ'.$answer4.'สัปดาห์',
//                                       'actions' => [
//                                           // [
//                                           //     'type' => 'postback',
//                                           //     'label' => 'good',
//                                           //     'data' => 'value'
//                                           // ],
//                                           [
//                                               'type' => 'uri',
//                                               'label' => 'กราฟ',
//                                               'uri' => 'https://bottest14.herokuapp.com/graph.php?data='.$user_id
//                                           ]
//                                       ]
//                                   ]
//                               ];
//          $q1 = pg_exec($dbconn, "UPDATE user_data SET user_weight= $answer4 WHERE user_id = '{$user_id}' ") or die(pg_errormessage()); 
//          $des_preg = pg_query($dbconn,"SELECT  descript,img FROM pregnants WHERE  week = $answer4  ");
//               while ($row = pg_fetch_row($des_preg)) {
//                   echo $des = $row[0]; 
//                   echo $img = $row[1]; 
 
//                 } 
//                     $messages4 = [
//                         'type' => 'text',
//                         'text' =>  $des
//                       ];
            $messages = [
                        'type' => 'text',
                        'text' => 'สัปดาห์นี้คุณมีน้ำหนักเท่าไรคะ'
                      ];

         $url = 'https://api.line.me/v2/bot/message/push';
         $data = [
          'to' => 'U2dc636d2cd052e82c29f5284e00f69b9',
          'messages' => [$messages],
         ];
         error_log(json_encode($data));
         $post = json_encode($data);
         $headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
         $ch = curl_init($url);
         curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
         curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
         curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
         curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
         $result = curl_exec($ch);
         curl_close($ch);
         echo $result . "\r\n";


?>
//Uaafbb71ac91f028b6db1e6151d9db31b แนน
//U2dc636d2cd052e82c29f5284e00f69b9 เราเอง
//U7b12240413f5497290de34cd5fdf6fea ดร.
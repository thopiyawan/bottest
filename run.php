

<?php 


$id =$_GET['id'];

// if($id ==''){
// exit();
// }
$user_id = pg_escape_string($id);
$conn_string = "host=ec2-54-163-233-201.compute-1.amazonaws.com port=5432 dbname=dchdrsngrf50pd user=njppbbukwreesq password=c6b890bd6e0dccc4a5db3308869ba5e2735fe0e5df7a3f0de6f114cc24752e04";
$dbconn = pg_pconnect($conn_string);
if (!$dbconn) {
    die("Connection failed: " . mysqli_connect_error());
}


$objQuery = pg_query($dbconn,"SELECT * FROM users WHERE user_id = '{$user_id}'  ");
            
$objResult = pg_fetch_array($objQuery);

//ดึงข้อมูล ID มาจาก Databases
// $objQuery = mysql_query("SELECT * FROM users where user_id = $ID ") or die(mysql_error());
// $objResult = mysql_fetch_array($objQuery);

// echo "hellooo";
//นำเอาตัวแปร มาแปลงเป็น json แล้วส่งออก
echo json_encode($objResult);


$ch = curl_init();
// Disable SSL verification
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
// Will return the response, if false it print the response
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// Set the url
curl_setopt($ch, CURLOPT_URL,"http://mikrotik108.com/api.php?id=".$id );
// Execute
$result=curl_exec($ch);
// Closing
curl_close($ch);
// แปลงข้อมูลที่รับมาในรูป json มาเป็น array จะได้ใช้ง่าย ๆ
$DATA= json_decode($result, true);
// //dump ข้อมูลออกมาดู
print_r($DATA);


//   $replyToken = $event['replyToken'];
//     $x_tra = 'แพ้ท้อง';
//     $url = 'https://www.googleapis.com/customsearch/v1?&cx=011030528095328264272:_0c9oat4ztq&key=AIzaSyBgzyv2TiMpaZxxthxX1jYNdskfxi7ah_4&q='.$x_tra;
//     // $url2 = 'https://www.googleapis.com/customsearch/v1?&cx=014388729015054466439:gqr4m9bfx0i&key=AIzaSyDmVU8aawr5mNpqbiUdYMph8r7K-siKn-0&q='.$x_tra;
//     $json= file_get_contents($url);
//     // $json2= file_get_contents($url2);
//     // var_dump($json1);
    
//     $events = json_decode($json, true);
//     $title= $events['items'][0]['title'];
//     $title2= $events['items'][1]['title'];
//     $title3= $events['items'][2]['title'];


//     $link = $events['items'][0]['link'];
//     $link2 = $events['items'][1]['link'];
//     $link3 = $events['items'][2]['link'];

//     $pic = $events['items'][0];
//      echo $title;
//     echo $link;

// var_dump($pic);



    
  //  var_dump($events);
    // echo $title;
    // echo $link;
   // $messages = [
   //      'type' => 'template',
   //      'altText' => 'template',
   //      'template' => [
   //          'type' => 'buttons',
   //          'title' =>  $x_tra,
   //          'text' =>   'สามารถกดดูข้อมูลจากลิงค์ด้านล่างได้เลยค่ะ',
   //          'actions' => [
   //              [
   //                  'type' => 'uri',
   //                  'label' => 'ไปยังลิงค์',
   //                  'uri' => $link
   //              ],
   //              [
   //                  'type' => 'uri',
   //                  'label' => 'ไปยังลิงค์ที่2',
   //                  'uri' => $link2
   //              ],
   //              [
   //                  'type' => 'uri',
   //                  'label' => 'ไปยังลิงค์ที่3',
   //                  'uri' => $link3
   //              ]
   //          ]
   //      ]
   //  ];

// $strFileName = "autoreply.php";

// // $objFopen = fopen($strFileName, 'r');
// $content = file_get_contents($strFileName);









// }elseif (strlen($_msg) == 5 && $seqcode == "0008") {

//     // $birth_years =  str_replace("วันที่","", $_msg);
//     $pieces = explode(" ", $_msg);
//     $date = str_replace("","",$pieces[0]);
//     $month  = str_replace("","",$pieces[1]);
//     $date_today = date("d"); 
//     $month_today = date("m");  
        

//     if (is_numeric($month) !== false &&is_numeric($date) !== false && strlen($date) == 2 && strlen($month) == 2  ) {
//         if($date<31 && $date >=0 && $month <12 && $month>=0 && $month<$month_today  || ( $month== $month_today &&  $date< $date_today )){


//                $d_pre1 = $date - $date_today;
//                $d_pre = abs($d_pre1);
//                 if($d_pre>=7){
//                    $m_pre = ($month_today - $month)*4;
//                    $w_pre =  $d_pre/7;
//                    $w_pre = round($w_pre);
//                   /////คำตอบ/////
//                    $re_date_pre =  $d_pre%7;
//                    $re_date_pre = number_format($re_date_pre);
//                    $re_week_pre = $m_pre+$w_pre;
//                    $age_pre = 'คุณมีอายุครรภ์'. $re_week_pre.'สัปดาห์'. $re_date_pre .'วัน' ;


//     $replyToken = $event['replyToken'];
//     $messages = [
//         'type' => 'template',
//         'altText' => 'this is a confirm template',
//         'template' => [
//             'type' => 'confirm',
//             'text' =>  $age_pre ,
//             'actions' => [
//                 [
//                     'type' => 'message',
//                     'label' => 'ถูกต้อง',
//                     'text' => 'อายุครรภ์ถูกต้อง'
//                 ],
//                 [
//                     'type' => 'message',
//                     'label' => 'ไม่ถูกต้อง',
//                     'text' => 'ไม่ถูกต้อง'
//                 ],
//             ]
//         ]
//     ];   

//                 }else{
//                    $re_date_pre = $date - $date_today;
//                    $re_week_pre = ($month_today - $month)*4; 
//                      $age_pre = 'คุณมีอายุครรภ์'. $re_week_pre.'สัปดาห์'. $re_date_pre .'วัน' ;


//     $replyToken = $event['replyToken'];
//     $messages = [
//         'type' => 'template',
//         'altText' => 'this is a confirm template',
//         'template' => [
//             'type' => 'confirm',
//             'text' =>  $age_pre ,
//             'actions' => [
//                 [
//                     'type' => 'message',
//                     'label' => 'ถูกต้อง',
//                     'text' => 'อายุครรภ์ถูกต้อง'
//                 ],
//                 [
//                     'type' => 'message',
//                     'label' => 'ไม่ถูกต้อง',
//                     'text' => 'ไม่ถูกต้อง'
//                 ],
//             ]
//         ]
//     ];   
//                 }

          
        
//         }else{

//         	$date = str_replace("","",$pieces[0]);
//             $month  = str_replace("","",$pieces[1]);
//             $date_today = date("d"); 
//             $month_today = date("m"); 


//         	$m = 12-$month;
//         	$d = 31-$date;
//         	$m1  = $month_today-01;
//         	$d1  = $date_today-01;

//            if ($m1<=9 ){
//                $replyToken = $event['replyToken'];
//                  $messages = [
//                         'type' => 'text',
//                         'text' => '5555'
//                       ]; 
//            }else{
//                  $replyToken = $event['replyToken'];
//                  $messages = [
//                         'type' => 'text',
//                         'text' => 'กรุณาพิมพ์ใหม่'
//                       ]; 

//            }
          

//         }
//     } else {
  
//                 $replyToken = $event['replyToken'];
//                  $messages = [
//                         'type' => 'text',
//                         'text' => 'กรุณาพิมพ์ใหม่ตามนี้ 17 02(วันที่ เดือน)'
//                       ];  

//     }   

  
//       $url = 'https://api.line.me/v2/bot/message/reply';
//          $data = [
//           'replyToken' => $replyToken,
//           'messages' => [$messages],
//          ];
//          error_log(json_encode($data));
//          $post = json_encode($data);
//          $headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
//          $ch = curl_init($url);
//          curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
//          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//          curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
//          curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
//          curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
//          $result = curl_exec($ch);
//          curl_close($ch);
//          echo $result . "\r\n";
//     $q = pg_exec($dbconn, "INSERT INTO sequentsteps(sender_id,seqcode,answer,nextseqcode,status,created_at,updated_at )VALUES('{$user_id}','0008', $re_week_pre ,'0009','0',NOW(),NOW())") or die(pg_errormessage());
    


























?>




<!-- TWO STEPS TO INSTALL PREGNANCY CALCULATOR:

  1.  Copy the coding into the HEAD of your HTML document
  2.  Add the last code into the BODY of your HTML document  -->

<!-- STEP ONE: Paste this code into the HEAD of your HTML document  -->

 

<!-- Script Size:  5.17 KB -->
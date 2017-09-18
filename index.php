<?php
//database
$conn_string = "host=ec2-54-163-233-201.compute-1.amazonaws.com port=5432 dbname=dchdrsngrf50pd user=njppbbukwreesq password=c6b890bd6e0dccc4a5db3308869ba5e2735fe0e5df7a3f0de6f114cc24752e04";
$dbconn = pg_pconnect($conn_string);
//

$access_token = 'GKg1wAZ/gjMr6yh3dGmPjuq8HnkDQEZsOdPEfyur3h7JmjdT2JihbEBHL6S4BrLnHCuu0Cv2fSbvwv0/xZqYw+TEjmmqW2mjC5NB9BcVGguZq3CIHX+Vt+fvPcNwtcT2ER0LLVXSwhNN4aVJT0Q08QdB04t89/1O/w1cDnyilFU=';

$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
$_msg = $events['events'][0]['message']['text'];
$user = $events['events'][0]['source']['userId'];
// Validate parsed JSON data
if (!is_null($events['events'])) {
 // Loop through each event
 foreach ($events['events'] as $event) {
  // Reply only when message sent is in 'text' format
  if (strpos($_msg, 'hello') !== false || strpos($_msg, 'สวัสดี') !== false || strpos($_msg, 'หวัดดี') !== false) {
      $replyToken = $event['replyToken'];
      $text = "สวัสดีค่ะ คุณสนใจมีผู้ช่วยไหม";
      // $messages = [
      //   'type' => 'text',
      //   'text' => $text
      // ];
        $messages = [
       'type' => 'template',
        'altText' => 'this is a confirm template',
        'template' => [
            'type' => 'confirm',
            'text' => $text ,
            'actions' => [
                [
                    'type' => 'message',
                    'label' => 'ต้องการ',
                    'text' => 'ต้องการ'
                ],
                [
                    'type' => 'message',
                    'label' => 'ไม่ต้องการ',
                    'text' => 'ไม่ต้องการ'
                ],
            ]
        ]
    ];
        
  }elseif($event['type'] == 'message' && $event['message']['type'] == 'sticker') {
     // Get text sent
   //    $text = $event['template'];
   //    $text = "hello world!";
   $st1 = $events['events'][0]['message']['packageId'];
   $st2 = $events['events'][0]['message']['stickerId'];
   // Get replyToken
   $replyToken = $event['replyToken'];

   // Build message to reply back
   $messages = [
    'type'=> 'sticker',
    'packageId'=> $st1,
    'stickerId'=> $st2
   ];
   
  
} elseif (strpos($_msg, 'บันทึก') !== false) {
 $replyToken = $event['replyToken'];
//********คำวณBMI********//
    $x_tra =  str_replace("บันทึก","", $_msg);
    $pieces = explode(":", $x_tra);
    $height = str_replace("","",$pieces[0]);
    $weight  = str_replace("","",$pieces[1]);


$sql="INSERT INTO history(date_history,user_id,weight,height) VALUES( NOW() ,'U2dc636d2cd052e82c29f5284e00f69b9' , $weight, $height )";
pg_exec($dbconn, $sql) or die(pg_errormessage()); 	  
	 

} elseif (strpos($_msg, 'คำนวณ') !== false) {
 $replyToken = $event['replyToken'];
//********คำวณBMI********//
    $x_tra =  str_replace("คำนวณ","", $_msg);
    $pieces = explode(":", $x_tra);
    $height = str_replace("","",$pieces[0]);
    $width  = str_replace("","",$pieces[1]);
//********ใส่ 5 ค่าลง array********//
	  
$weight = "SELECT weight FROM history ";	  
pg_exec($dbconn, $weight) or die(pg_errormessage());	  
    $result = $weight/($height*$height);
    
        $messages = [
        'type' => 'template',
        'altText' => 'BMI chart',
        'template' => [
            'type' => 'buttons',
            'thumbnailImageUrl'=> 'https://bottest14.herokuapp.com/n_susu.png',
            'title' => 'BMI',
            'text' => $result ,
            'actions' => [
                [
                    'type' => 'uri',
                    'label' => 'chart',
                    'uri' => 'https://bottest14.herokuapp.com/te.php?data1='.$result.'&data2='.$width 
                ]
            ]
        ]
    ];
 
}elseif ($event['message']['text'] == "ต้องการ" ) {
                 $replyToken = $event['replyToken'];
                 $messages = [
                        'type' => 'text',
                        'text' => 'ขอเริ่มสอบถามข้อมูลเบื้องต้นก่อนนะคะ ขอทราบพ.ศ.เกิดของคุณเพื่อคำนวณอายุ'
                      ];
 }elseif ($event['message']['text'] == "ไม่ต้องการ" ) {
                 $replyToken = $event['replyToken'];
                 $messages = [
                        'type' => 'text',
                        'text' => 'ไว้โอกาสหน้าให้เราได้เป็นผู้ช่วยของคุณนะคะ:) ขอบคุณค่ะ'
                      ];  
 }elseif (strpos($_msg, 'เกิด') !== false) {
  
    $birth_years =  str_replace("เกิด","", $_msg);
    $curr_years = date("Y"); 
    $age = ($curr_years+ 543)- $birth_years;
    $age_mes = 'คุณอายุ'.$age.'ถูกต้องหรือไม่คะ  ' ;

                 $replyToken = $event['replyToken'];
                 $messages = [
                        'type' => 'text',
                        'text' =>  $age_mes
                      ];      
   
 }else{
    $replyToken = $event['replyToken'];
    $text = "ว่าไงนะ";
    $messages = [
        'type' => 'text',
        'text' => $text
      ];
    
  }

  
 }
}

  // Make a POST Request to Messaging API to reply to sender
         $url = 'https://api.line.me/v2/bot/message/reply';
         $data = [
          'replyToken' => $replyToken,
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
 
echo "OK"; 
?>

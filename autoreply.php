
<?php

//database
$conn_string = "host=ec2-54-163-233-201.compute-1.amazonaws.com port=5432 dbname=dchdrsngrf50pd user=njppbbukwreesq password=c6b890bd6e0dccc4a5db3308869ba5e2735fe0e5df7a3f0de6f114cc24752e04";
$dbconn = pg_pconnect($conn_string);
//

$access_token = 'GKg1wAZ/gjMr6yh3dGmPjuq8HnkDQEZsOdPEfyur3h7JmjdT2JihbEBHL6S4BrLnHCuu0Cv2fSbvwv0/xZqYw+TEjmmqW2mjC5NB9BcVGguZq3CIHX+Vt+fvPcNwtcT2ER0LLVXSwhNN4aVJT0Q08QdB04t89/1O/w1cDnyilFU=';

$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);



$curr_years = date("Y");
$curr_y = ($curr_years+ 543);


$_msg = $events['events'][0]['message']['text'];
$user = $events['events'][0]['source']['userId'];
$user_id = pg_escape_string($user);


//****************ทดสอบ
       $d = date("D");
       $h = date("H:i");
//****************ทดสอบ จบ

$u_id =[];
$preg_week = [];
$s =[];
$p_week[];
$check_q = pg_query($dbconn,"SELECT DISTINCT user_id , preg_week  FROM user_data   ");

            while ($row = pg_fetch_assoc($check_q)) {
                  $u_id[] =  $row['user_id'];
                  $preg_week[] =  $row['preg_week'];
                } 
array_push( $s,$u_id);
array_push( $p_week,$preg_week);
print_r($s);
print_r($p_week);

$arrlength = count($s);

for($x = 0; $x < $arrlength+1 ; $x++) {
       $userid = $s[0][$x];
       $p_week = $p_week[0][$x]+1;
        $messages = [
                        'type' => 'text',
                        'text' => 'สัปดาห์นี้คุณมีน้ำหนักเท่าไรคะ'
                    ];

           $messages1 = [
                        'type' => 'text',
                        'text' => 'คุณมีอายุครรภ์'.$p_week.'สัปดาห์แล้วนะคะ:)'
                      ];


         $url = 'https://api.line.me/v2/bot/message/push';
         $data = [
          'to' => $userid ,
          'messages' => [$messages,$messages1],
         ];

      ]
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



}


 


?>

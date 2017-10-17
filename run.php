

<?php 


$strFileName = "autoreply.php";

// $objFopen = fopen($strFileName, 'r');
$content = file_get_contents($strFileName);









}elseif (strlen($_msg) == 5 && $seqcode == "0008") {

    // $birth_years =  str_replace("วันที่","", $_msg);
    $pieces = explode(" ", $_msg);
    $date = str_replace("","",$pieces[0]);
    $month  = str_replace("","",$pieces[1]);
    $date_today = date("d"); 
    $month_today = date("m");  
        

    if (is_numeric($month) !== false &&is_numeric($date) !== false && strlen($date) == 2 && strlen($month) == 2  ) {
        if($date<31 && $date >=0 && $month <12 && $month>=0 && $month<$month_today  || ( $month== $month_today &&  $date< $date_today )){


               $d_pre1 = $date - $date_today;
               $d_pre = abs($d_pre1);
                if($d_pre>=7){
                   $m_pre = ($month_today - $month)*4;
                   $w_pre =  $d_pre/7;
                   $w_pre = round($w_pre);
                  /////คำตอบ/////
                   $re_date_pre =  $d_pre%7;
                   $re_date_pre = number_format($re_date_pre);
                   $re_week_pre = $m_pre+$w_pre;
                   $age_pre = 'คุณมีอายุครรภ์'. $re_week_pre.'สัปดาห์'. $re_date_pre .'วัน' ;


    $replyToken = $event['replyToken'];
    $messages = [
        'type' => 'template',
        'altText' => 'this is a confirm template',
        'template' => [
            'type' => 'confirm',
            'text' =>  $age_pre ,
            'actions' => [
                [
                    'type' => 'message',
                    'label' => 'ถูกต้อง',
                    'text' => 'อายุครรภ์ถูกต้อง'
                ],
                [
                    'type' => 'message',
                    'label' => 'ไม่ถูกต้อง',
                    'text' => 'ไม่ถูกต้อง'
                ],
            ]
        ]
    ];   

                }else{
                   $re_date_pre = $date - $date_today;
                   $re_week_pre = ($month_today - $month)*4; 
                     $age_pre = 'คุณมีอายุครรภ์'. $re_week_pre.'สัปดาห์'. $re_date_pre .'วัน' ;


    $replyToken = $event['replyToken'];
    $messages = [
        'type' => 'template',
        'altText' => 'this is a confirm template',
        'template' => [
            'type' => 'confirm',
            'text' =>  $age_pre ,
            'actions' => [
                [
                    'type' => 'message',
                    'label' => 'ถูกต้อง',
                    'text' => 'อายุครรภ์ถูกต้อง'
                ],
                [
                    'type' => 'message',
                    'label' => 'ไม่ถูกต้อง',
                    'text' => 'ไม่ถูกต้อง'
                ],
            ]
        ]
    ];   
                }

          
        
        }else{
           if ($m1<=9 ){
               $replyToken = $event['replyToken'];
                 $messages = [
                        'type' => 'text',
                        'text' => '5555'
                      ]; 
           }else{
                 $replyToken = $event['replyToken'];
                 $messages = [
                        'type' => 'text',
                        'text' => 'กรุณาพิมพ์ใหม่'
                      ]; 

           }
          

        }
    } else {
  
                $replyToken = $event['replyToken'];
                 $messages = [
                        'type' => 'text',
                        'text' => 'กรุณาพิมพ์ใหม่ตามนี้ 17 02(วันที่ เดือน)'
                      ];  

    }   

  
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
    $q = pg_exec($dbconn, "INSERT INTO sequentsteps(sender_id,seqcode,answer,nextseqcode,status,created_at,updated_at )VALUES('{$user_id}','0008', $re_week_pre ,'0009','0',NOW(),NOW())") or die(pg_errormessage());
    


























?>
//Uaafbb71ac91f028b6db1e6151d9db31b แนน
//U2dc636d2cd052e82c29f5284e00f69b9 เราเอง
//U7b12240413f5497290de34cd5fdf6fea ดร.




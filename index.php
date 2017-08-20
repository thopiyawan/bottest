<?php
$access_token = 'GKg1wAZ/gjMr6yh3dGmPjuq8HnkDQEZsOdPEfyur3h7JmjdT2JihbEBHL6S4BrLnHCuu0Cv2fSbvwv0/xZqYw+TEjmmqW2mjC5NB9BcVGguZq3CIHX+Vt+fvPcNwtcT2ER0LLVXSwhNN4aVJT0Q08QdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');


$data = json_decode($json,true);
// Parse JSON
$events = json_decode($content, true);

// Validate parsed JSON data
if (!is_null($events['events'])) {
 // Loop through each event
 foreach ($events['events'] as $event) {
  // Reply only when message sent is in 'text' format
  if ($event['type'] == 'message' && $event['message']['type'] == 'text' && $event['message']['text'] == "สวัสดี") {
      $replyToken = $event['replyToken'];
      $text = "hello world!";
      $messages = [
        'type' => 'text',
        'text' => $text
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
   
  }elseif($event['type'] == 'message' && $event['message']['type'] == 'text' && $event['message']['text'] == "เลือก") {
     $replyToken = $event['replyToken'];
        $messages = [
        'type' => 'template',
        'altText' => 'ボタン',
        'template' => [
            'type' => 'buttons',
            'title' => 'タイトルです',
            'text' => '選択してね',
            'actions' => [
                [
                    'type' => 'postback',
                    'label' => 'webhookにpost送信',
                    'data' => 'value'
                ],
                [
                    'type' => 'uri',
                    'label' => 'googleへ移動',
                    'uri' => 'https://google.com'
                ]
            ]
        ]
    ];
 } elseif ($event['type'] == 'message' && $event['message']['type'] == 'text' && $event['message']['text'] == "เมนู") {
    $replyToken = $event['replyToken'];
    $messages = [
       'type' => 'template',
        'altText' => 'this is a confirm template',
        'template' => [
            'type' => 'confirm',
            'text' => 'Are you sure?',
            'actions' => [
                [
                    'type' => 'message',
                    'label' => 'yes',
                    'text' => 'yes'
                ],
                [
                    'type' => 'message',
                    'label' => 'no',
                    'text' => 'no'
                ],
            ]
        ]
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


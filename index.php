<?php
$access_token = 'GKg1wAZ/gjMr6yh3dGmPjuq8HnkDQEZsOdPEfyur3h7JmjdT2JihbEBHL6S4BrLnHCuu0Cv2fSbvwv0/xZqYw+TEjmmqW2mjC5NB9BcVGguZq3CIHX+Vt+fvPcNwtcT2ER0LLVXSwhNN4aVJT0Q08QdB04t89/1O/w1cDnyilFU=';
// Get POST body content
$content = file_get_contents('php://input');
// $data = json_decode($json,true);
// Parse JSON
$events = json_decode($content, true);

print_r($events);
$_msg = $events['events'][0]['message']['text'];

// $_msg = 'หาที่พัก';
// $events['events'] = ['replyToken',2,3,4,5,6,7,8,9];

// Validate parsed JSON data
if (!is_null($events['events'])) {
 // Loop through each event
  foreach ($events['events'] as $event) {
  // Reply only when message sent is in 'text' format
    if (strpos($_msg, 'สวัสดี') !== false) {
        $replyToken = $event['replyToken'];
        $text = "สวัสดีค่ะ";
        $messages = [
          'type' => 'text',
          'text' => $text
        ];
     
    } elseif (strpos($_msg, 'หา') !== false) {
      $replyToken = $event['replyToken'];
      $x_tra = str_replace("หา","", $_msg);
      $url = 'https://www.googleapis.com/customsearch/v1?&cx=014388729015054466439:e_gyj6qnxr8&key=AIzaSyDmVU8aawr5mNpqbiUdYMph8r7K-siKn-0&q='.$x_tra;
      $json= file_get_contents($url);
      $events = json_decode($json, true);
      $title= $events['items'][0]['title'];
      $link = $events['items'][0]['link'];
      $items = $events['items'];
      for ($i = 0 ; $i<5 ; $i++){
        	$messages = [
                        'type' => 'template',
                        'altText' => 'this is a carousel template',
                        'template' => [
                            'type' => 'carousel',
                            'columns' => [
                            'title' => $events['items'][$i]['title'],
                            'text' => 'description',
                            'actions' => [
                              [
                                  'type' => 'postback',
                                  'label' => 'buy',
                                  'data' => 'value'
                              ],
                              [
                                  'type' => 'uri',
                                  'label' => 'add to catrt',
                                  'uri' => $events['items'][$i]['link']
                              ]
                            ]
                          ]
                        ]
                      ]
                     ]
    }

    } else {
        $replyToken = $event['replyToken'];
        $text = "ว่าไงนะ";
        $messages = [
            'type' => 'text',
            'text' => $text
          ];
        
    }
  }
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
 
echo "OK"; 
?>

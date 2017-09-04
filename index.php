<?php
$access_token = 'GKg1wAZ/gjMr6yh3dGmPjuq8HnkDQEZsOdPEfyur3h7JmjdT2JihbEBHL6S4BrLnHCuu0Cv2fSbvwv0/xZqYw+TEjmmqW2mjC5NB9BcVGguZq3CIHX+Vt+fvPcNwtcT2ER0LLVXSwhNN4aVJT0Q08QdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');


$data = json_decode($json,true);
// Parse JSON
$events = json_decode($content, true);
$_msg = $events['events'][0]['message']['text'];
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
   
  }elseif($event['type'] == 'message' && $event['message']['type'] == 'text' && $event['message']['text'] == "ปุ่ม") {
     $replyToken = $event['replyToken'];
        $messages = [
        'type' => 'template',
        'altText' => 'ボタン',
        'template' => [
            'type' => 'buttons',
            'title' => 'อากาศเป็นไงบ้าง',
            'text' => 'อากาศ',
            'actions' => [
//                 [
//                     'type' => 'postback',
//                     'label' => 'good',
//                     'data' => 'value'
//                 ],
                [
                    'type' => 'uri',
                    'label' => 'google',
                    'uri' => 'https://google.com'
                ]
            ]
        ]
    ];
 } elseif ($event['type'] == 'message' && $event['message']['type'] == 'text' && $event['message']['text'] == "ยืนยัน") {
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
} elseif ($event['type'] == 'message' && $event['message']['type'] == 'text' && $event['message']['text'] == "ทดสอบ") {
 $replyToken = $event['replyToken'];
 $messages = [
        'type' => 'template',
        'altText' => 'this is a carousel template',
        'template' => [
            'type' => 'carousel',
            'columns' => [
               [
                    'title' => 'this is menu',
                    'text' => 'description',
                    'actions' => [
                        [
                            'type' => 'postback',
                            'label' => 'buy',
                            'data' => 'value'
                        ],
                        [
                            'type' => 'uri',
                            'label' => 'add to cart',
                            'uri' => 'http://clinic.e-kuchikomi.info/'
                        ]
                    ]
                ],
                [
                    'title' => 'this is menu',
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
                            'uri' => 'https://jobikai.com/'
                        ]
                    ]
                ],
            ]
        ]
    ];
      
} elseif (strpos($_msg, 'คำนวณ') !== false) {
 $replyToken = $event['replyToken'];
   
    $x_tra = str_replace("คำนวณ","", $_msg);
    $pieces = explode(":", $x_tra);
    $height =str_replace("","",$pieces[0]);
    $width =str_replace("","",$pieces[1]);
    //Post New Data
     $result = $width/($height*$height);
 
        $messages = [
        'type' => 'template',
        'altText' => 'a',
        'template' => [
            'type' => 'buttons',
            'thumbnailImageUrl'=> 'data:image/png;base64,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',
            'title' => 'BMI',
            'text' => $result ,
            'actions' => [
                [
                    'type' => 'uri',
                    'label' => 'chart',
                    'uri' => 'https://bottest14.herokuapp.com/te.html'
                ]
            ]
        ]
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
  //  $data1 = array(); 
  //  $val = array();
//$data = [];
//$val = [];
//$g = [];
//$x = [];
//   $z = [];
//$action = [];
// $eventsdata = array_slice($events->items,5);
 //   foreach($events->items as $mydata)

    //{
//        echo $mydata->title;
//        echo $mydata->link;
       // $z = array( 'type' => 'uri',
         //           'label' => 'Click for detail',
         //           'uri' => $mydata->link
          //        );
     
       // array_push($action,$z);
      //  $x = array ( 'title' => $mydata->title,
       //             'text' => 'description',
       //             'actions' => [$action]
       //           );
     
     
        //array_push($g,$x);
       // $action = [];
        
        //echo $mydata->title. "\n";
        //echo $mydata->link. "\n"; 


//        $val = array(
//                "thumbnailImageUrl" => "https://example.com/bot/images/item1.jpg",
//                "title" => $mydata->title
////                 "actions" => [{
////                                "type"=> "uri",
////                                "label" => $mydata->title,
////                                "uri" => $mydata->link
////                                }]
//                
//                );
//        array_push($data,$val);
 //   }
   $i = 1;
      $data = [];
$val = [];
          foreach($events->items as $mydata){
                if($i <= 5){
               $val = array(
                    'title' => $mydata->title,
                    'text' => 'description',
                    'actions' => [    
                        [
                            'type' => 'uri',
                            'label' => 'add to cart',
                            'uri' => $mydata->link
                        ]  
                    ]
               );
                array_push($data,$val);    
                }
                $i++;
            }
      
   $messages = [
        'type' => 'template',
        'altText' => 'this is a carousel template',
        'template' => [
            'type' => 'carousel',
            'columns' => [
           
              " [
                    'title' => 'this is menu',
                    'text' => 'description',
                    'actions' => [
                        [
                            'type' => 'postback',
                            'label' => 'buy',
                            'data' => 'value'
                        ],
                        [
                            'type' => 'uri',
                            'label' => 'add to cart',
                            'uri' => 'http://clinic.e-kuchikomi.info/'
                        ]
                    ]
                ],
        
                [
                    'title' => 'this is menu',
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
                            'uri' => 'https://jobikai.com/'
                        ]
                    ]
                ],"
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
?>

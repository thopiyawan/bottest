<?php

      
include('con_db.php');  
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
        'altText' => 'ปุ่ม',
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
//********คำวณBMI********//
    $x_tra =  str_replace("คำนวณ","", $_msg);
    $pieces = explode(":", $x_tra);
    $height = str_replace("","",$pieces[0]);
    $width  = str_replace("","",$pieces[1]);
//********ใส่ 5 ค่าลง array********//	 
   
    $result = $width/($height*$height);
    
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
 } elseif (strpos($_msg, 'หา') !== false) {



    $replyToken = $event['replyToken'];
    $x_tra = str_replace("หา","", $_msg);
   
//     $url = 'https://www.googleapis.com/customsearch/v1?&cx=014388729015054466439:e_gyj6qnxr8&key=AIzaSyDmVU8aawr5mNpqbiUdYMph8r7K-siKn-0&q='.$x_tra;
   // $url = 'https://www.googleapis.com/customsearch/v1?&cx=014388729015054466439:e_gyj6qnxr8&key=AIzaSyCdlIPgeHwexorxeKsVvjrW1fwh4SOjOjI&q='.$x_tra;
    //$url = 'https://www.googleapis.com/customsearch/v1?&cx=014388729015054466439:e_gyj6qnxr8&key=AIzaSyAzNh-0u0rojtkaQvmBlCg44f7oGIvFWdw&q='.$x_tra;
    //$url = 'https://www.googleapis.com/customsearch/v1?&cx=014388729015054466439:e_gyj6qnxr8&key=AIzaSyAACKRpkX5IcqTtZeQAY0i4MGM8Gx2_Xrk&q='.$x_tra;
    $url = 'https://www.googleapis.com/customsearch/v1?&cx=011030528095328264272:_0c9oat4ztq&key=AIzaSyBgzyv2TiMpaZxxthxX1jYNdskfxi7ah_4&q='.$x_tra;
    //$url = 'https://www.googleapis.com/customsearch/v1?&cx=014388729015054466439:e_gyj6qnxr8&key=AIzaSyDmVU8aawr5mNpqbiUdYMph8r7K-siKn-0&q='.$x_tra;
    $json= file_get_contents($url);
    $events = json_decode($json, true);
    $title= $events['items'][0]['title'];
    $link = $events['items'][0]['link'];
    $items = $events['items'];
   
//    $messages = [ 
//   'type'=> 'template',
//   'altText'=> 'this is a carousel template',
//   'template'=> [
//       'type'=> 'carousel',
//       'columns'=> [
//           [ 
//       for ($i = 0 ; $i < 5 ; $i++){
	  
//             //'thumbnailImageUrl'=> 'https://botbot1234.herokuapp.com/images/luffy.jpg',
//             'title' =>  'อะโล่',
//             'text' =>   $events['items'][$i]['title'],
//             'actions'=> [
//                 [
//                     'type'=> 'postback',
//                     'label'=> 'OK',
//                     'data'=> 'action=buy&itemid=111'
//                 ],
//                 [
//                     'type'=> 'postback',
//                     'label'=> 'OK',
//                     'data'=> 'action=buy&itemid=111'
//                 ]
//              ]
// 	  }]
// 	  ]]];
	  
      for ($i = 0 ; $i<3 ; $i++){
            $me[$i] =[
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
                      ];


          
          }  

              // array_push($g,$me);
               $messages = [
                    'type' => 'template',
                    'altText' => 'this is a carousel template',
                    'template' => [
                        'type' => 'carousel',
                        'columns' =>$me
                    ]
                ];

   
   
//////////////////////////////////////// TEST DATA ////////////////////////////////////////////////
            
//     $me = [];
//     $messages = [];
//        for ($i = 0 ; $i<5 ; $i++){
//         array_push($me,[
//                     'title' => $events['items'][$i]['title'],
//                     'text' => 'description',
//                     'actions' => [
//                         [
//                             'type' => 'postback',
//                             'label' => 'buy',
//                             'data' => 'value'
//                         ],
//                         [
//                             'type' => 'uri',
//                             'label' => 'add to catrt',
//                             'uri' => $events['items'][$i]['link']
//                         ]
//                     ]
//                  ]);

  
   
//    }

//    array_push($messages,[
//         'type' => 'template',
//         'altText' => 'this is a carousel template',
//         'template' => [
//             'type' => 'carousel',
//             'columns' => [$me]
//         ]
//     ]);
   
   
   
   
   
   
   
   
   
   
   
   
/////////////////////////////////////////////// END TEST /////////////////////////////////////////	  
   
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
//    $i = 1;
//       $data = [];
// $val = [];
//           foreach($events->items as $mydata){
//                 if($i <= 5){
//                $val = array(
//                     'title' => $mydata->title,
//                     'text' => 'description',
//                     'actions' => [    
//                         [
//                             'type' => 'uri',
//                             'label' => 'add to cart',
//                             'uri' => $mydata->link
//                         ]  
//                     ]
//                );
//                 array_push($data,$val);    
//                 }
//                 $i++;
//             }
      
//    $messages = [
//         'type' => 'template',
//         'altText' => 'this is a carousel template',
//         'template' => [
//             'type' => 'carousel',
//             'columns' => [
           
//               " [
//                     'title' => 'this is menu',
//                     'text' => 'description',
//                     'actions' => [
//                         [
//                             'type' => 'postback',
//                             'label' => 'buy',
//                             'data' => 'value'
//                         ],
//                         [
//                             'type' => 'uri',
//                             'label' => 'add to cart',
//                             'uri' => 'http://clinic.e-kuchikomi.info/'
//                         ]
//                     ]
//                 ],
        
//                 [
//                     'title' => 'this is menu',
//                     'text' => 'description',
//                     'actions' => [
//                         [
//                             'type' => 'postback',
//                             'label' => 'buy',
//                             'data' => 'value'
//                         ],
//                         [
//                             'type' => 'uri',
//                             'label' => 'add to catrt',
//                             'uri' => 'https://jobikai.com/'
//                         ]
//                     ]
//                 ],"
//             ]
//         ]
//     ];

  
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

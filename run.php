

<?php 


  $replyToken = $event['replyToken'];
    $x_tra = str_replace("","", $_msg);
    $url = 'https://www.googleapis.com/customsearch/v1?&cx=014388729015054466439:e_gyj6qnxr8&key=AIzaSyDmVU8aawr5mNpqbiUdYMph8r7K-siKn-0&q='.$x_tra;
    $url2 = 'https://www.googleapis.com/customsearch/v1?&cx=014388729015054466439:gqr4m9bfx0i&key=AIzaSyDmVU8aawr5mNpqbiUdYMph8r7K-siKn-0&q='.$x_tra;
    $json1= file_get_contents($url);
    $json2= file_get_contents($url2);
    print_r($json1);
    
    // $events = json_decode($json, true);
    // $title= $events['items'][0]['title'];
    // $title2= $events['items'][1]['title'];
    // $title3= $events['items'][2]['title'];
    
    // $link = $events['items'][0]['link'];
    // $link2 = $events['items'][1]['link'];
    // $link3 = $events['items'][2]['link'];
  
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
//Uaafbb71ac91f028b6db1e6151d9db31b แนน
//U2dc636d2cd052e82c29f5284e00f69b9 เราเอง
//U7b12240413f5497290de34cd5fdf6fea ดร.




<!-- TWO STEPS TO INSTALL PREGNANCY CALCULATOR:

  1.  Copy the coding into the HEAD of your HTML document
  2.  Add the last code into the BODY of your HTML document  -->

<!-- STEP ONE: Paste this code into the HEAD of your HTML document  -->

<HEAD>

<SCRIPT LANGUAGE="JavaScript">
<!-- Original:  Ronnie T. Moore, Editor -->
<!-- Web Site:  JavaScript Source Code 3000 -->

<! >
<! >

<!-- Begin
function isValidDate(dateStr) {
// Date validation function courtesty of 
// Sandeep V. Tamhankar (stamhankar@hotmail.com) -->

// Checks for the following valid date formats:
// MM/DD/YY   MM/DD/YYYY   MM-DD-YY   MM-DD-YYYY

var datePat = /^(\d{1,2})(\/|-)(\d{1,2})\2(\d{4})$/; // requires 4 digit year

var matchArray = dateStr.match(datePat); // is the format ok?
if (matchArray == null) {
alert("Date is not in a valid format.")
return false;
}
month = matchArray[1]; // parse date into variables
day = matchArray[3];
year = matchArray[4];
if (month < 1 || month > 12) { // check month range
alert("Month must be between 1 and 12.");
return false;
}
if (day < 1 || day > 31) {
alert("Day must be between 1 and 31.");
return false;
}
if ((month==4 || month==6 || month==9 || month==11) && day==31) {
alert("Month "+month+" doesn't have 31 days!")
return false;
}
if (month == 2) { // check for february 29th
var isleap = (year % 4 == 0 && (year % 100 != 0 || year % 400 == 0));
if (day>29 || (day==29 && !isleap)) {
alert("February " + year + " doesn't have " + day + " days!");
return false;
   }
}
return true;
}

function dispDate(dateObj) {
month = dateObj.getMonth()+1;
month = (month < 10) ? "0" + month : month;

day   = dateObj.getDate();
day = (day < 10) ? "0" + day : day;

year  = dateObj.getYear();
if (year < 2000) year += 1900;

return (month + "/" + day + "/" + year);
}

function pregnancyCalc(pregform) {
menstrual = new Date(); // creates new date objects
ovulation = new Date();
duedate = new Date();
today = new Date();
cycle = 0, luteal = 0; // sets variables to invalid state ==> 0

if (isValidDate(pregform.menstrual.value)) { // Validates menstual date 
menstrualinput = new Date(pregform.menstrual.value);
menstrual.setTime(menstrualinput.getTime())
}
else return false; // otherwise exits

cycle = (pregform.cycle.value == "" ? 28 : pregform.cycle.value); // defaults to 28
// validates cycle range, from 22 to 45
if (pregform.cycle.value != "" && (pregform.cycle.value < 22 || pregform.cycle.value > 45)) {
alert("Your cycle length is either too short or too long for \n"
+ "calculations to be very accurate!  We will still try to \n"
+ "complete the calculation with the figure you entered. ");
}

luteal = (pregform.luteal.value == "" ? 14 : pregform.luteal.value); // defaults to 14
// validates luteal range, from 9 to 16
if (pregform.luteal.value != "" && (pregform.luteal.value < 9 || pregform.luteal.value > 16)) {
alert("Your luteal phase length is either too short or too long for \n"
+ "calculations to be very accurate!  We will still try to complete \n"
+ "the calculation with the figure you entered. ");
}

// sets ovulation date to menstrual date + cycle days - luteal days
// the '*86400000' is necessary because date objects track time
// in milliseconds;  86400000 milliseconds equals one day
ovulation.setTime(menstrual.getTime() + (cycle*86400000) - (luteal*86400000));
pregform.conception.value = dispDate(ovulation);

// sets due date to ovulation date plus 266 days
duedate.setTime(ovulation.getTime() + 266*86400000);
pregform.duedate.value = dispDate(duedate);

// sets fetal age to 14 + 266 (pregnancy time) - time left
var fetalage = 14 + 266 - ((duedate - today) / 86400000);
weeks = parseInt(fetalage / 7); // sets weeks to whole number of weeks
days = Math.floor(fetalage % 7); // sets days to the whole number remainder

// fetal age message, automatically includes 's' on week and day if necessary
fetalage = weeks + " week" + (weeks > 1 ? "s" : "") + ", " + days + " days";
pregform.fetalage.value = fetalage;

return false; // form should never submit, returns false
}
//  End -->
</script>
</HEAD>

<!-- STEP TWO: Copy this code into the BODY of your HTML document  -->

<BODY>

<center>
<form onSubmit="return pregnancyCalc(this);">
<table>
<tr><td>
<pre>
Last Menstrual Period:        <input type=text name=menstrual value="" size=10 maxlength=10>
                              (MM/DD/YYYY format)

Average Length of Cycles:     <input type=text name=cycle value="" size=3 maxlength=3> (22 to 45)
                              (defaults to 28)

Average Luteal Phase Length:  <input type=text name=luteal value="" size=3 maxlength=3> (9 to 16)
                              (defaults to 14)

<center><input type=submit value="Calculate!"></center>

Estimated Conception:         <input type=text name=conception value="" size=20>
Estimated Due Date:           <input type=text name=duedate value="" size=20>
Estimated Fetal Age:          <input type=text name=fetalage value="" size=20>
</pre>
</td></tr>
</table>
</form>
</center>


 

<!-- Script Size:  5.17 KB -->
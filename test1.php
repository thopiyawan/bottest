<?php  
$hostname = "ec2-54-163-233-201.compute-1.amazonaws.com" ;
$Dbuser = "njppbbukwreesq" ;
$Dbpwd = "dc6b890bd6e0dccc4a5db3308869ba5e2735fe0e5df7a3f0de6f114cc24752e04" ;
$Dbname = "dchdrsngrf50pd" ;
mysql_connect($hostname, $Dbuser, $Dbpwd  ); 
if( mysql_select_db($Dbname)){
          $replyToken = $event['replyToken'];
      $text = "บันทึกสำเร็จ";
      $messages = [
        'type' => 'text',
        'text' => $text
      ];
}else{ 
	 $replyToken = $event['replyToken'];
      $text = "บันทึกไม่สำเร็จ";
      $messages = [
        'type' => 'text',
        'text' => $text
      ]; }
?>

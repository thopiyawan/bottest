<?php 


$cachedir='cache'; // ชื่อแฟ้มเก็บไฟล์แคช 777 ด้วยนะ
$file='index.php'; // ชื่อไฟล์ที่จะเก็บ
$cachefile=$cachedir.'/'.$file;
$cachetime =60;  // ระยะเวลา 1 วัน
if (file_exists($cachefile) && (time() - $cachetime < filemtime($cachefile))) {
include($cachefile);
}else{
//ใส่ไฟล์ที่ต้องการรัน include() ไฟล์เข้ามาเลยก็ได้
$fp = fopen($cachefile, 'w');
fwrite($fp, ob_get_contents()); 
fclose($fp);
ob_end_flush();
}

?>
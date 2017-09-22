<?php  
$conn_string = "host=ec2-54-163-233-201.compute-1.amazonaws.com port=5432 dbname=dchdrsngrf50pd user=njppbbukwreesq password=c6b890bd6e0dccc4a5db3308869ba5e2735fe0e5df7a3f0de6f114cc24752e04";
$dbconn = pg_pconnect($conn_string);
if (!$dbconn) {
    die("Connection failed: " . mysqli_connect_error());
}


//////////////////////////////////////////////////////////////////////
 // $sql="DROP TABLE IF EXISTS users_data";
 // $sql1="DROP TABLE IF EXISTS Pregnancy_week_data";
 // $sql2="DROP TABLE IF EXISTS history_con";
 // $sql3="DROP TABLE IF EXISTS history_preg";
 // pg_exec($dbconn, $sql) or die(pg_errormessage());
 // pg_exec($dbconn, $sql1) or die(pg_errormessage());
 // pg_exec($dbconn, $sql2) or die(pg_errormessage());
 // pg_exec($dbconn, $sql3) or die(pg_errormessage());

//////////////////////////////////////////////////////////////////////

//*************************
// $sql="CREATE TABLE test(
// userid varchar(225),
// mes  varchar(225),
// date_his DATE,
// PRIMARY KEY(userid)
// )";   
// pg_exec($dbconn, $sql) or die(pg_errormessage());
//**************************

///////////////////////////////////////////////////////////////////////////////////////////////////////
// $query = 'select weight from history ';
// $result = pg_query($query);
// while ($row = pg_fetch_row($result)) {
//  $e =  "น้ำหนัก $row[0] ";
// }
// echo $e;
///////////////////////////////////////////////////////////////////////////////////////////////////////
// $user = "fdsgaegaeewt5444";
// $escaped = pg_escape_string($user);
// $height = "33";
// $weight = "344";
// $sql="INSERT INTO history(date_history,users,weight,height) VALUES(NOW(),'{$escaped}',$weight,$height )";
 // $sql =  pg_query("INSERT INTO history(date_history,users,weight,height) VALUES(NOW(),'{$escaped}',$weight,$height )");
// pg_exec($dbconn, $sql) or die(pg_errormessage());

//************************NEW_TABLE*******************************************************
// $sql="CREATE TABLE users_data (
// user_id  varchar(225),
// user_age varchar(2),
// user_weight varchar(3),
// user_height varchar(3),
// preg_week date,

// PRIMARY KEY(user_id)
// )";   
// pg_exec($dbconn, $sql) or die(pg_errormessage());

// $sql="CREATE TABLE Pregnancy_week_data(
// week_preg varchar(3),
// des_preg text,
// picture_preg varchar(225),

// PRIMARY KEY(week_preg)
// )";   
// pg_exec($dbconn, $sql) or die(pg_errormessage());


// $sql="CREATE TABLE history_con(
// his_id  SERIAL,
// user_id  varchar(225),
// his_message varchar(3),
// his_date timestamp ,

// PRIMARY KEY(his_id),
// FOREIGN KEY (user_id) REFERENCES users_data(user_id)
// )";   
// pg_exec($dbconn, $sql) or die(pg_errormessage());

// $sql="CREATE TABLE history_preg(
// his_preg_id SERIAL,
// his_preg_week  varchar(2),
// his_preg_weight varchar(3),

// user_id  varchar(225),

// PRIMARY KEY(his_preg_id),
// FOREIGN KEY (his_preg_week) REFERENCES Pregnancy_week_data(week_preg),
// FOREIGN KEY (user_id) REFERENCES users_data(user_id)
// )";   
// pg_exec($dbconn, $sql) or die(pg_errormessage());
////////////////////////////////////////////////////////////////////////////////////////////////////



// $sql="CREATE TABLE sequents(
// id SERIAL,
// seqcode varchar(255),
// question varchar(255),
// answer varchar(255),
// nexttype integer,
// nextseqcode varchar(255),
// created_at timestamp,
// updated_at timestamp,
// PRIMARY KEY(id)

// )";   
// pg_exec($dbconn, $sql) or die(pg_errormessage());


// $sql="CREATE TABLE sequentsteps(
// id SERIAL,
// sender_id varchar(30),
// seqcode varchar(30),
// answer varchar(255),
// nextseqcode varchar(255),
// status varchar(255),
// created_at timestamp,
// updated_at timestamp,
// PRIMARY KEY(id)

// )";   
// pg_exec($dbconn, $sql) or die(pg_errormessage());


// $sql="CREATE TABLE pregnants(
// id SERIAL,
// week  integer,
// title text,
// descript text,
// img text,

// created_at timestamp,
// updated_at timestamp,
// PRIMARY KEY(id)

// )";   
// pg_exec($dbconn, $sql) or die(pg_errormessage());

$sql="INSERT INTO sequents (id, seqcode, question, answer, nexttype, nextseqcode, created_at, updated_at) VALUES
(1, '0001', 'สวัสดีค่ะ ดิฉันชื่อ เรมี่ (REMI) เป็นหุ่นยนต์อัตโนมัติที่ถูกสร้างเพื่อว่าที่คุณแม่นะคะ', NULL, 1, '0002', NULL, NULL),
(2, '0002', 'ดิฉันสามารถให้ข้อมูลที่เกี่ยวข้องกับการตั้งครรภ์ในระยะต่างๆ \nและหากคุณให้ข้อมูลน้ำหนักในแต่ละสัปดาห์ ดิฉันสามารถแสดงผลกราฟน้ำหนักตลอดช่วงการตั้งครรภ์เพื่อการเฝ้าระวังภาวะเบาหวานได้นะคะ', NULL, 1, '0003', NULL, NULL),
(3, '0003', 'เนื่องจากดิฉันยังเรียนรู้ภาษาอยู่ จึงอาจไม่เข้าภาษาดีพอนะคะ ต้องขออภัยล่วงหน้าด้วยคะ', NULL, 1, '0004', NULL, NULL),
(4, '0004', 'หากคุณสนใจให้ดิฉันเป็นผู้ช่วยอัตโนมัติของคุณ โปรดกดยืนยันด้างล่างด้วยนะคะ', NULL, 3, '0006', NULL, NULL),
(5, '0005', '<มี link ไปอ่าน agreement> Note: Agreement เดี๋ยวไปก๊อปเอา ประมาณว่าข้อมูลที่ให้โดย REMI ทางเราไม่รับผิดชอบ ห้ามฟ้องร้องทีหลัง\n<มีปุ่มยืนยัน และยกเลิก>\n', NULL, 3, '0006', NULL, NULL),
(6, '0006', 'ก่อนอื่น ดิฉันขออนุญาตถามข้อมูลเบื้องต้นเกี่ยวกับคุณก่อนนะคะ\nขอทราบปีพ.ศ.เกิดเพื่อคำนวณอายุค่ะ\n', NULL, 2, '0007', NULL, NULL),
(7, '0007', 'คุณอายุ ', 'ปี ถูกต้องหรือไม่ค่ะ ถ้าไม่ถูกต้องกรุณาพิมพ์ตัวเลขใหม่', 3, '0008', NULL, NULL),
(8, '0008', 'ขอทราบครั้งสุดท้ายที่คุณมีประจำเดือนเพื่อคำนวณอายุครรภ์ค่ะ (กรุณาตอบประมาณวันที่และเดือนเป็นตัวเลขนะคะ เช่น 17 04 คือ วันที่ 17 เมษายน)\n', NULL, 2, '0009', NULL, NULL),
(9, '0009', 'คุณมีอายุครรภ์ ', 'ถูกต้องหรือไม่ค่ะ ถ้าไม่ถูกต้องกรุณาพิมพ์ตัวเลขใหม่', 3, '0010', NULL, NULL),
(12, '0010', 'ขออนุญาตถามน้ำหนักปกติก่อนตั้งครรภ์ของคุณค่ะ (กรุณาตอบเป็นตัวเลขในหน่วยกิโลกรัม)\n', NULL, 2, '0011', NULL, NULL),
(13, '0011', 'ก่อนตั้งครรภ์ คุณมีน้ำหนัก ', 'กิโลกรัม ถูกต้องหรือไม่ค่ะ ถ้าไม่ถูกต้องกรุณาพิมพ์ตัวเลขใหม่  ', 3, '0012', NULL, NULL),
(14, '0012', 'ขออนุญาตถามน้ำหนักปัจจุบันของคุณค่ะ (กรุณาตอบเป็นตัวเลขในหน่วยกิโลกรัม)\n', NULL, 2, '0013', NULL, NULL),
(15, '0013', 'ปัจจุบัน คุณมีน้ำหนัก ', 'กิโลกรัม ถูกต้องหรือไม่ค่ะ ถ้าไม่ถูกต้องกรุณาพิมพ์ตัวเลขใหม่', 3, '0014', NULL, NULL),
(16, '0014', 'ขออนุญาตถามส่วนสูงปัจจุบันของคุณค่ะ (กรุณาตอบเป็นตัวเลขในหน่วยเซ็นติเมตร)', NULL, 2, '0015', NULL, NULL),
(17, '0015', 'ปัจจุบัน คุณมีส่วนสูง', 'เซ็นติเมตร ถูกต้องหรือไม่ค่ะ ถ้าไม่ถูกต้องกรุณาพิมพ์ตัวเลขใหม่', 3, '0016', NULL, NULL),
(18, '0016', 'รอการวิเคราะห์', NULL, 2, '0017', NULL, NULL),
(19, '1001', 'ขอทราบวันและเดือนที่ต้องการเพิ่มข้อมูลน้ำหนักค่ะ (กรุณาตอบประมาณวันที่และเดือนเป็นตัวเลขนะคะ เช่น 17 04 คือ วันที่ 17 เมษายน)', NULL, 2, '1002', NULL, NULL),
(20, '1002', '', 'หลังหมดประจำเดือน ถูกต้องหรือไม่ค่ะ ถ้าไม่ถูกต้องกรุณาพิมพ์ตัวเลขใหม่', 3, '1003', NULL, NULL),
(21, '1003', 'ขออนุญาตถามน้ำหนักปัจจุบันของคุณค่ะ (กรุณาตอบเป็นตัวเลขในหน่วยกิโลกรัม)', NULL, 2, '1004', NULL, NULL),
(22, '1004', 'น้ำหนัก ', 'กิโลกรัม ถูกต้องหรือไม่ค่ะ ถ้าไม่ถูกต้องกรุณาพิมพ์ตัวเลขใหม่', 3, '1005', NULL, NULL),
(23, '1005', 'รอการวิเคราะห์', NULL, 2, '1006', NULL, NULL)";
pg_exec($dbconn, $sql) or die(pg_errormessage());














?>

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

$sql="INSERT INTO pregnants (id, week, title, descript, img, created_at, updated_at) VALUES
(1, 1, 'สัปดาห์ที่ 1', 'ในทางการแพทย์แล้ว ช่วงสัปดาห์แรกนั้นยังไม่ถือว่าเป็นการตั้งครรภ์ที่แท้จริง โดยเมื่อเสปิร์มเดินทางมาพบกับไข่และเกิดการปฎิสนธิขึ้น โดยประมาณ 4 วันหลังจากเกิดการปฏิสนธิ ไข่ที่ได้รับการผสมแล้วจะมีลักษณะเป็นลูกกลม ประกอบด้วยเซลล์ประมาณ 100 เซลล์ ภายในลูกกลมนี้จะเป็นโพรงที่บรรจุของเหลว ซึ่งขนาดของไข่นี้จะไม่สามารถมองเห็นได้ด้วยตาเปล่า ไข่จะใช้เวลาอีกประมาณ 2 – 3 วัน ลอยอยู่ในโพรงมดลูก ช่วงระยะเวลาปลายสัปดาห์ ไข่ที่ได้รับการผสมแล้วนี้ จะหาที่อยู่อันอบอุ่น และปลอดภัย โดยการฝังตัวที่ผนังมดลูก เริ่มทำการสร้างรก และสายสะดือเพื่อเป็นทางนำอาหารจากแม่สู่ลูกและขับของเสียจากลูกสู่แม่', '1', NULL, NULL),
(2, 2, 'สัปดาห์ที่ 2', 'ในสัปดาห์ที่สองนี้ ไข่ที่ผสมแล้วจะมีการแบ่งเซลล์อย่างรวดเร็วเป็นทวีคูณ ในช่วงนี้คุณแม่ยังไม่รับรู้ว่ามีสิ่งมีชีวิตน้อยๆ มาอยู่ในร่างกายแล้ว และหากตรวจปัสสาวะจะยังไม่ขึ้น 2 ขีด เพราะฮอร์โมนที่อยู่ในปัสสาวะจะน้อยมาก ในคุณแม่บางท่าน อาจพบมีเลือดออกเล็กน้อย จากการเคลื่อนตัว ของตัวอ่อนไปฝังยังผนังมดลูก เลือดออกที่เกิดขึ้นนั้น เรียกว่า เลือดล้างหน้าเด็ก', '2', NULL, NULL),
(3, 3, 'สัปดาห์ที่ 3', 'เซลล์ที่ปฏิสนธิ แล้วจะเป็นเซลล์เล็กๆที่ เรียก Zygote จะใช้เวลาเดินทางไปยังโพรงมดลูก 36 ชั่วโมง และฝังตัวที่เยื่อบุโพรงมดลูก เซลล์จะแบ่งตัวอย่างรวดเร็วจนมีขนาดหลายร้อยเซลล์ ในจำนวนนี้จะแบ่งออกเป็น 2 ส่วน ส่วนที่อยู่ด้านในจะพัฒนาไปเป็นตัวอ่อน ส่วนที่อยู่ติดกับผนังมดลูกจะพัฒนาต่อไปจนกลายเป็นรก', '3', NULL, NULL),
(4, 4, 'สัปดาห์ที่ 4', 'ทารกที่เป็นตัวอ่อน ฝังตัวเข้าไปเป็นส่วนหนึ่งของผนังมดลูกแล้ว และแบ่งตัวต่ออย่างไม่หยุดยั้ง รวมกันเป็นแท่งยาว ความยาวของตัวอ่อนในช่วงสัปดาห์ที่ 4 จะยาวเพียง ¼ นิ้วเท่านั้น สัปดาห์นี้ตัวอ่อนจะเริ่มสร้างอวัยวะ โดยเซลล์จะแบ่งตัวออกเป็น 3 ชั้น  เริ่มจากชั้นนอก พัฒนาไปเป็นสมอง เส้นประสาท และผิวหนัง ชั้นกลาง พัฒนาเป็นกล้ามเนื้อ กระดูก เส้นเลือด หัวใจ และอวัยวะเพศ ชั้นใน พัฒนาเป็นอวัยวะภายนต่างๆ เช่น กระเพาะอาหาร หัวใจ ปวด ตับ ลำไส้ ปอด เป็นต้น ', '4', NULL, NULL),
(5, 5, 'สัปดาห์ที่ 5', 'ตัวอ่อนเริ่มมีร่างกายที่มองเห็นได้อย่างชัดเจนมากขึ้น ขนาดของเจ้าตัวน้อยจะโตประมาณเมล็ดส้มเขียวหวานหรือประมาณ 0.05 นิ้ว เริ่มมีการแบ่งแยกของกลุ่มเซลล์ที่จะเติบโตเป็นอวัยวะต่างๆ บางส่วนก็จะกลายเป็นสมอง หัวใจ กล้ามเนื้อ หรือกระดูก สร้างหัวใจครบ 4 ห้อง สามารถเห็นเป็นรูปร่างตั้งแต่ศีรษะถึงก้น แนวด้านร่างเป็นร่องยาว ซึ่งก็คือท่อของแนวประสาทไขสันหลัง ซึ่งด้านบนของท่อเจริญเติบโตเป็นสมองส่วนหน้าที่จะถูกพัฒนาก่อนเป็นอันดับแรก เริ่มมีหัวใจ สมอง ไขสันหลัง และกระดูกก็กำลังพัฒนา พร้อมๆ กับส่วนอื่นๆ   ในช่วงต้นของสัปดาห์ที่ 5 และอวัยวะสำคัญต่างๆ เช่น หัวใจ ไต ตับ กระเพาะอาหารเริ่มทำงานได้แล้ว เซลล์ส่วนหนึ่งจะเจริญเติบโตไปเป็นสมอง', '5', NULL, NULL),
(6, 6, 'สัปดาห์ที่ 6', 'ในสัปดาห์นี้ตัวอ่อนจะมีความสูงประมาณ 8 มม. มีขนาดเท่ากับลูกอ๊อดตัวเล็กๆหัวใจเริ่มเต้นประมาณ 100–130 ครั้งต่อนาที เลือดเริ่มไหลเวียนปุ่มเล็กๆที่จะกลายเป็นแขนขาเริ่มเป็นรูปร่าง และตาก็จะเริ่มเป็นรูปร่างและเริ่มมีสีคล้ำขึ้น สมองส่วนต่างๆ เติบโตเร็วมากมีการขยายไปทั่วศีรษะ ระบบนัยน์ตาที่ซับซ้อนก็กำลังพัฒนาอย่างรวดเร็วเช่นกัน อวัยวะภายนอกเช่นแขน เริ่มสร้างตัวเป็นรูปร่างขึ้น ถ้าคุณแม่ได้รับการตรวจโดยการอัลตร้าซาวน์ ก็จะได้ยินเสียงเต้นของหัวใจลูกน้อย', '6', NULL, NULL),
(7, 7, 'สัปดาห์ที่ 7', 'สัปดาห์นี้ตัวอ่อนมีขนาดพอๆ กับองุ่นลูกจิ๋ว (1.2 เซ็นติเมตร) และเติบโตขึ้น 1 มิลลิเมตรทุกวัน หัวใจ ปอด มีการพัฒนามากขึ้น ระบบการย่อยอาหารกำลังพัฒนา ระบบทางเดินอาหารเริ่มก่อตัว และที่สำคัญคือ สมองและไขสันหลัง มีการพัฒนาระบบเส้นประสาทต่างๆ อย่างต่อเนื่อง แขนขาเริ่มเป็นรูปร่าง เริ่มมีเค้าโครงใบหน้า เริ่มมองเห็นตำแหน่งตา รูจมูก แขนขา เริ่มดูเป็นเด็กทารกขึ้นอีกเล็กน้อยเปลือกตา นิ้วเท้า และนิ้วมือก็เริ่มเป็นรูปร่างแม้จะมีพังผืดหนาๆ เชื่อมอยู่ เริ่มเห็นรูจมูกชัดเจนขึ้น และเริ่มเห็นปลายจมูกทางเดินหายใจเล็กๆ เริ่มปรากฏ', '7', NULL, NULL),
(8, 8, 'สัปดาห์ที่ 8', 'ตอนนี้ตัวอ่อนมีความยาวประมาณ 1.6 ซม. และเริ่มเคลื่อนไหวเป็นครั้งแรก หัวใจเต้นประมาณ 150 ครั้งต่อนาที พัฒนาการต่างๆ ด้านร่างกายมีมากขึ้น เริ่มมีเปลือตา ปาก และจมูกจะเริ่มชัดเจนยิ่งขึ้น ปุ่มฟันน้ำนมเริ่มเป็นรูปร่าง แขนเริ่มยาวมีความโค้งช่วงข้อศอก เซลล์กระดูกมีมากขึ้น เซลล์กระดูกก็เริ่มเป็นรูปร่างขึ้นมาแทนที่กระดูกอ่อน ข้อต่อเล็กๆ เริ่มเจริญเติบโตขึ้นอวัยวะทุกส่วนจะเริ่มเข้าที่ และจะเริ่มมีลายนิ้วมือในระยะนี้', '8', NULL, NULL),
(9, 9, 'สัปดาห์ที่ 9', 'สัปดาห์นี้จะเห็นเป็นเด็กน้อยมากขึ้น ตัวยาวประมาณ 2 ซม. แขนและขาของลูกจะเจริญเติบโตอย่างรวดเร็ว เปลือกตาเริ่มเป็นรูปร่าง นัยย์ตามีการพัฒนามากขึ้น แต่ยังไม่เปิดเพราะเยื่อหนังตายังพัฒนาไม่สมบูรณ์ และเริ่มเห็นการพัฒนาของหูชัดเจนขึ้น  นิ้วมือและนิ้วเท้าถึงแม้จะเป็นตุ่มเล็กๆ แต่ก็เห็นว่าเริ่มแยกออกจากกัน ปุ่มฟันเติบโตโครงสร้างของใบหน้าเริ่มก่อตัวเป็นรูปร่าง ศีรษะใหญ่มากกว่าส่วนอื่นๆ ของร่างกาย  เซลล์กระดูกเริ่มมีโครงสร้างที่ชัดเจน ลูกน้อยเริ่มเคลื่อนไหวตัวไปมา อวัยวะภายใน เช่น ระบบย่อยอาหาร มีการพัฒนาตามลำดับ', '9', NULL, NULL),
(10, 10, 'สัปดาห์ที่ 10', 'สัปดาห์นี้ลูกน้อยตัวยาวเพิ่มขึ้นเกือบ 4 เซนติเมตร สมองส่วนไฮโปธาลามัสของทารกในครรภ์เริ่มพัฒนา อวัยวะส่วนต่างๆ มีครบแล้วและเห็นได้ชัดเจน ไม่ว่าจะเป็นใบหู หัวเข่า ข้อเท้า นิ้วมือและนิ้วเท้า  ในแต่ละวันลูกจะเคลื่อนไหวมากขึ้น และเริ่มหลับๆตื่นๆพร้อมทั้งบริหารกล้ามเนื้อของตน แขนจะงอบริเวณที่เป็นข้อศอกและ กระดูกสันหลังเห็นชัดเจนมากขึ้น', '10', NULL, NULL),
เห็นแล้วโดย Kanyamat Loetkawinanan เวลา 14:25
Bodin Milindankura
Milindankura
(11, 11, 'สัปดาห์ที่ 11', 'สัปดาห์นี้ลูกน้อยในครรภ์จะมีความยาวเกือบ 5  เซนติเมตร และมีน้ำหนักประมาณ 8.5 กรัม ตับเริ่มการผลิตเซลล์เม็ดเลือดแดง และไต เริ่มทำงานแล้ว ลูกน้อยสามารถ‘หายใจ\'เอาน้ำคร่ำเข้าไปและถ่ายปัสสาวะได้ นิ้วมือของลูกน้อยแยกกันได้แล้ว และในไม่ช้าก็จะกำและแบมือได้ ', '11', NULL, NULL),
(12, 12, 'สัปดาห์ที่ 12', 'สัปดาห์นี้ลูกน้อยในครรภ์ มีความยาวประมาณ 6.3  เซนติเมตร และมีน้ำหนักมากกว่า 14 กรัม มีอวัยวะครบทุกส่วน ใบหน้าเริ่มมีเค้าโครง เริ่มดูดปากเป็น ภายใต้ขากรรไกรมีการสร้างเหง้าฟันครบ 32 เหง้า ในขณะที่ปากมีปุ่มเล็กๆ 20 ปุ่มซึ่งจะกลายเป็นฟันในอนาคต เส้นผมของลูกน้อยเริ่มยาวขึ้น และเริ่มมีเล็บขึ้นที่นิ้วมือและนิ้วเท้ายาวขึ้น และเริ่มมีเล็บขึ้นที่นิ้วมือและนิ้วเท้า', '12', NULL, NULL),
(13, 13, 'สัปดาห์ที่ 13', 'สัปดาห์นี้จะเห็นพัฒนาการของลูกน้อยมากขึ้น เริ่มมีสัดส่วนเหมือนเด็กแรกเกิด มีความยาวประมาณ 7.6 เซนติเมตร ลูกน้อยเริ่มเคลื่อนไหวอย่างสม่ำเสมอ ทั้งเตะ และหมุนตัวแต่คุณแม่ไม่สามารถรู้สึกได้เนื่องจากลูกน้อยยังตัวเล็กอยู่มาก ศีรษะเริ่มมีขนาดใหญ่ถึง 1 ใน 3 ของลำตัว ไตของลูกน้อยเริ่มทำงานโดยการส่งปัสสาวะไปยังกระเพาะปัสสาวะ ', '13', NULL, NULL),
(14, 14, 'สัปดาห์ที่ 14', 'สัปดาห์นี้ลูกน้อยในครรภ์ มีความยาวประมาณ 9 เซนติเมตรและหนักประมาณ 42.5 กรัม สามารถเปรียบเทียบได้กับลูกเลม่อน ', '14', NULL, NULL),
(15, 15, 'สัปดาห์ที่ 15', 'สัปดาห์นี้ลูกน้อยในครรภ์ มีความยาวประมาณ 10 เซนติเมตร และหนักประมาณ 71 กรัม ลูกน้อยมีขนาดประมาณผลแอปเปิ้ลไซต์กลางๆ ในสัปดาห์นี้ส่วนของลำตัวจะเติบโตเร็วกว่าส่วนศีรษะ มีเส้นผมปกคลุมศีรษะ เริ่มมีขนตาและคิ้ว เริ่มแสดงสีหน้าต่างๆได้ ลูกน้อยจะมีเซลล์สมองเพิ่มขึ้นนาทีละ 250,000 เซลล์ กระดูกอ่อนเริ่มพัฒนากลายเป็นกระดูกแข็งตามลำดับและมีขนอ่อนที่เรียกว่าลานูโก(lanugo)ปรากฏบนผิวหนัง', '15', NULL, NULL),
(16, 16, 'สัปดาห์ที่ 16', 'สัปดาห์นี้ลูกน้อยในครรภ์ มีความยาวประมาณ 11.4  เซนติเมตร และหนักประมาณ 110.5  กรัม ลูกน้อยมีขนาดประมาณผลอะโวคาโด  เริ่มกำหมัดได้แล้ว เล็บที่นิ้วโป้งท้าวเริ่มงอกยาวขึ้น เปลือกตาของลูกจะยังปิดอยู่ เซลล์ประสาทกำลังสร้างปลอกหุ้มรอบเส้นใยประสาท ซึ่งจะช่วยให้ระบบประสาทเชื่อมต่อกันเร็วขึ้น', '16', NULL, NULL),
(17, 17, 'สัปดาห์ที่ 17', 'สัปดาห์นี้จะเห็นพัฒนาการของลูกน้อยมากขึ้น ตัวยาวประมาณ 12.7 เซนติเมตร น้ำหนักเกือบ 150 กรัม แขนและขาเริ่มสมบูรณ์มากขึ้น ลูกน้อยสามารถขมวดคิ้ว ชำเลืองตาขึ้นมาได้ การได้ยินของลูกดีขึ้นมาก จะเห็นได้ว่าลูกน้อยเริ่มมีการตอบสนองต่อเสียงจากโลกภายนอกได้', '17', NULL, NULL),
(18, 18, 'สัปดาห์ที่ 18', 'สัปดาห์ที่18นี้ลูกน้อยในครรภ์ มีความยาวประมาณ 14  เซนติเมตร และหนักประมาณ 198 กรัม เริ่มมีการฝึกพับแขน พับขา และเคลื่อนไหวร่างกายไปมา เริ่มมีลายนิ้วมือและนิ้วเท้าเล็กๆ ลูกน้อยอยู่ในช่วงกำลังฝึกหายใจเอาน้ำคร่ำเข้าปอดและหายใจออกโดยการปล่อยน้ำคร่ำออกมา ในสัปดาห์นี้จะเห็นอวัยเพศที่ชัดเจนขึ้นโดยถ้าได้ลูกสาว มดลูกและท่อนำไข่อยู่ในตำแหน่งที่ดีแล้ว แต่ถ้าได้ลูกชายจะสามารถเห็นอวัยวะเพศของลูกน้อยได้อย่างชัดเจน', '18', NULL, NULL),
(19, 19, 'สัปดาห์ที่ 19', 'ในสัปดาห์นี้ลูกน้อยในครรภ์ มีความยาวประมาณ 15 เซนติเมตร และหนักเพิ่มขึ้นค่อนข้างเร็วถึง 226 กรัม เซลล์สมองจะเพิ่มขึ้นนาทีละ ประมาณ 50,000 ถึง 100,000 เซลล์ ประสาทการรับรู้การดมกิน การชิมรส การได้ยิน การมอง และการสัมผัสถูกพัฒนาขึ้น', '19', NULL, NULL),
(20, 20, 'สัปดาห์ที่ 20', 'ลูกน้อยในสัปดาห์นี้มีขนาดความยาวประมาณ 17.7 เซนติเมตร โดยจะมีความยาวได้ครึ่งหนึ่งของตอนคลอด และมีน้ำหนักมากกว่า 300 กรัม ผิวของลูกจะมีไขมันเคลือบผิว สามารถฝึกกลืนน้ำคร่ำได้มากขึ้น มีการตรวจพบการเต้นของหัวใจได้ง่าย สมองในส่วนที่ควบคุมความรู้สึกจะเติบโตขึ้นอย่างรวดเร็ว แต่ในสัปดาห์นี้ลูกน้อยจะมีการเติบโตช้าลง เพื่อที่จะพัฒนาระบบต่างๆในร่างกายให้เต็มที่ก่อน', '20', NULL, NULL);

(21, 21, 'สัปดาห์ที่ 21', 'ในสัปดาห์นี้ความยาวของลูกน้อยจะไม่ค่อยเปลี่ยนไปมาก และมีน้ำหนักประมาณ 311 กรัม ไขกระดูกของลูกน้อยพร้อมที่จะผลิตเม็ดเลือดแดง ลูกน้อยสามารถได้ยินเสียงที่คุณแม่พูดและร้องเพลงให้ฟัง ซึ่งในสัปดาห์นี้เป็นช่วงเวลาที่ดีที่คุณแม่จะเริ่มพูดคุยกับลูกและลูกน้อยเคลื่อนไหวมากขึ้นจนคุณแม่รู้สึกได้ว่าลูกเตะที่หน้าท้องเบาๆ', '21', NULL, NULL),
(22, 22, 'สัปดาห์ที่ 22', 'พัฒนาการของลูกน้อยในสัปดาห์นี้มีความยาวประมาณ 28 เซนติเมตร และมีน้ำหนักถึง 450 กรัม ในนัยน์ตาของลูกน้อยเริ่มมองเห็นแสงที่อยู่นอกมดลูกได้ มีหูที่รูปร่างสมบูรณ์พร้อมที่จะตอบสนองต่อเสียงที่ได้ยิน มีหนังตาและริมฝีปากสมบูรณ์มากขึ้น ', '22', NULL, NULL),
(23, 23, 'สัปดาห์ที่ 23', 'ลูกน้อยในสัปดาห์นี้มีขนาดประมาณผลมะละกอ แขนและขาเริ่มมีพัฒนาการต็มที่ สามารถกำมือคว้าสายสะดือได้แล้ว เด็กผู้ชายถุงอัณฑะจะมีการพัฒนาเกือบสมบูรณ์แล้ว ส่วนเด็กผู้หญิงมีการพัฒนาของรังไข่ที่ภายในมีเซลล์ไข่อยู่พร้อมแล้ว คุณแม่จะรู้สึกได้ว่าลูกเตะท้องมากขึ้นหรือกำลังสะอึกอยู่', '23', NULL, NULL),
(24, 24, 'สัปดาห์ที่ 24', 'ในสัปดาห์นี้ลูกน้อยในครรภ์ มีความยาวประมาณ 30 เซนติเมตร และมีน้ำหนักประมาณ 540 กรัม เริ่มลืมตาได้ มีการเตรียมตัวหายใจเป็นครั้งแรก วัดอัตราการเต้นของหัวใจได้ ถุงลมในปอดพัฒนาสมบูรณ์แล้ว อวัยวะที่สำคัญเริ่มมีรูปร่างเกือบสมบูรณ์ ผิวหนังของลูกน้อยยังโปร่งใส สามารถมองเห็นเส้นเลือดได้อยู่ ', '24', NULL, NULL),
(25, 25, 'สัปดาห์ที่ 25', 'ในสัปดาห์นี้ลูกน้อยมีลำตัวยาวประมาณ 34 เซนติเมตร มีน้ำหนักประมาณ 620 กรัม รูปร่างภายนอกจะเริ่มเหมือนเด็กแรกเกิดมากขึ้น ส่วนกลางของลำตัวเริ่มแข็งมากขึ้น มีเส้นผมที่หนาขึ้น ในสัปดาห์นี้คุณแม่สามารถเปิดเพลงเบาๆให้ลูกน้อยฟังได้ เพราะสมองเริ่มเรียนรู้และจดจำสิ่งต่างๆได้ตั้งแต่อยู่ในครรภ์ ', '25', NULL, NULL),
(26, 26, 'สัปดาห์ที่ 26', 'สัปดาห์ที่ 26นี้ ลูกน้อยมีความยาวประมาณ 36 เซนติเมตร น้ำหนักประมาณ 650 กรัม ตื่นและนอนเป็นเวลา สามารถลืมตาและกะพริบตาได้ มีพัฒนาการได้ยินเพิ่มมากขึ้นตามลำดับ เริ่มรับรู้ถึงเสียงที่คุ้นเคย ภายในปอดจะเริ่มมีถุงลมเล็กๆซึ่งช่วยให้ลูกน้อยได้หายใจได้อย่างเต็มที่เมื่อแรกคลอด มีอัตราการเต้นของหัวใจประมาณ 150 ครั้งต่อนาที ', '26', NULL, NULL),
(27, 27, 'สัปดาห์ที่ 27', 'ในสัปดาห์นี้ลูกน้อยมีลำตัวยาวประมาณ 37 เซนติเมตร และมีน้ำหนักเพิ่มขึ้นประมาณ 900 กรัม ซึ่งเป็นสัปดาห์ที่น้ำหนักเพิ่มขึ้นค่อนข้างเร็ว ลูกน้อยจะเริ่มได้รับภูมิต้านทานโรคที่ถ่ายทอดผ่านสายสะดือ และสามารถมองเห็นแสงที่ผ่านมาทางหน้าท้องคุณแม่ได้', '27', NULL, NULL),
(28, 28, 'สัปดาห์ที่ 28', 'เด็กมีน้ำหนักตัวประมาณ 1 กิโลกรัม และลำตัวยาววประมาณ 14.8 นิ้ว อัตราการเต้นของหัวใจ 150 ครั้งต่อนาที เด็กสามารถเปิดปิดดวงตาและมองไปรอบๆได้ เด็กจะเตะครรภ์เมื่อมีสิ่งที่น่าตื่นเต้น จะหดแขนและขามาแนบที่อกในท่าขดตัวเพื่ออยู่ในท่าที่สบาย เซลล์ประสาทก็ยังพัฒนาอย่างต่อเนื่อง คุณพ่อจะได้ยินเสียงหัวใจลูกเต้นได้เมื่อเอาหูแนบท้องคุณแม่', '28', NULL, NULL),
(29, 29, 'สัปดาห์ที่ 29', 'เด็กมีน้ำหนักประมาณ 1.13 กก.และความยาวลำตัวประมาณ 17 นิ้ว (43 ซม.) ร่างกายมีการสร้างกล้ามเนื้อเพิ่มมากขึ้น สายตาเริ่มปรับโฟกัส สีตาเด่นชัดขึ้น ศีรษะของลูกมีขนาดใหญ่ขึ้นเพื่อเผื่อพื้นที่ให้สมองที่กำลังพัฒนา ฟันเริ่มงอกภายในเหงือกและเด็กเตะบ่อยขึ้น แสดงทักษะการเคลื่อนไหวได้ดีขึ้น ', '29', NULL, NULL),
(30, 30, 'สัปดาห์ที่ 30', 'เด็กมีขนาดลำตัวยาวประมาณ 40 ซม. และน้ำหนักประมาณ 1.1 กก. เป็นครั้งแรกที่เด็กฝึกการหายใจ และช่วงเวลานี้ เด็กในครรภ์ใช้เวลานอนกว่าร้อยละ 80 อยู่ในระยะหลับฝัน (Rapid Eye Movement หรือ REM) อวัยวะส่วนใหญ่ พัฒนาครบและเกือบสมบูรณ์ แต่ยังต้องพัฒนาให้เต็มที่ สมองเติบโตอย่างรวดเร็ว', '30', NULL, NULL),

(31, 31, 'สัปดาห์ที่ 31', 'เด็กมีขนาดลำตัวยาวประมาณ 40 ซม. และน้ำหนักประมาณ 1.5 กก. สมองของเด็กมีการเติบโตอย่างรวดเร็วโดยเฉพาะส่วนความจำ ขนอ่อนที่เคยปกป้องผิวเริ่มหลุดออก อวัยวะต่างๆ ยังคงพัฒนาอย่างต่อเนื่อง', '31', NULL, NULL),
(32, 32, 'สัปดาห์ที่ 32', 'เด็กมีลำตัวยาวประมาณ 42 ซม. และหนักประมาณ 1.6 กก. ผมของลูกงอกยาวขึ้น เด็กนอนและตื่นเริ่มเป็นเวลา สังเกตได้จากการที่ลูกดิ้นในช่วงเวลาเดิมๆทุกวัน ระบบการทำงานทั้งหมดของร่างกายพัฒนาอย่างสมบูรณ์แล้ว ยกเว้นปอดกับทางเดินหายใจที่ยังคงพัฒนา', '32', NULL, NULL),
(33, 33, 'สัปดาห์ที่ 33', 'เด็กมีน้ำหนักตัวประมาณ 1.9 กก.และลำตัวยาวประมาณ 44 ซม. รอยเหี่ยวย่นบริเวณผิวของเด็กเริ่มลดลง มีการสร้างไขมันเคลือบผิวหนังให้หนาตัวขึ้น ผมและเล็บเริ่มยาว ระบบภูมิต้านทานโรคของเด็กเริ่มแข็งแรงมากขึ้นและปอดพัฒนาอย่างเต็มที่เตรียมพร้อมออกมาสู่โลกภายนอก ', '33', NULL, NULL),
(34, 34, 'สัปดาห์ที่ 34', 'เด็กมีลำตัวยาวประมาณ 45 ซม. และน้ำหนักประมาณ 2 กก. ผิวหนังเริ่มหนาขึ้นเพราะมีชั้นไขมันสะสม เล็บงอกยาวขึ้น  มีขนคิ้ว ขนตา ขึ้นครบ เด็กผู้ชายลูกอัณฑะลงมาอยู่ที่ขาหนีบ', '34', NULL, NULL),
(35, 35, 'สัปดาห์ที่ 35', 'เด็กมีความยาวลำตัวประมาณ 20 นิ้ว (50.8 ซม.) หนักประมาณ 2.3 กก. เด็กในครรภ์มีการตอบสนองต่อแสง เสียง และความเจ็บปวด ภายในลำไส้ของเด็กจะเต็มไปด้วยของเหลวสีเขียวเข้มที่เรียกว่า \'เมโคเนียม\' (Meconium) ซึ่งเกิดจากของเสียที่ขับออกมาจากตับและลำไส้  ', '35', NULL, NULL),
(36, 36, 'สัปดาห์ที่ 36', 'เด็กมีลำตัวยาวประมาณ 47 ซม. และอาจมีน้ำหนักประมาณ 2.32 กก. ลำไส้ผลิตขี้เทา ระบบประสาทพร้อมสั่งการดูด กลืน หาว มีไขมันสะสมใต้ผิวมากขึ้น เด็กเริ่มอ้วนขึ้น มีน้ำหนักเพิ่มขึ้น 140 กรัมต่อสัปดาห์ ในช่วงนี้หากเป็นลูกคนแรก เด็กอาจจะกลับหัวพร้อมคลอด', '36', NULL, NULL),
(37, 37, 'สัปดาห์ที่ 37', 'สัปดาห์นี้เด็กหันศีรษะลงมาบริเวณกระดูกอุ้งเชิงกรานแล้ว เด็กมีน้ำหนักเฉลี่ย 2.7 กก. และลำตัวยาวประมาณ 49 ซม. คุณแม่จะรู้สึกว่าลูกมีการเคลื่อนไหว เพราะลูกมีการบิดตัว เด็กมีใบหน้าอ้วนขึ้นและมีขนตา คอเริ่มหนาขึ้น ลูกฝึกหายใจตลอดและเปิดปิดตาได้ง่ายขึ้น', '37', NULL, NULL),
(38, 38, 'สัปดาห์ที่ 38', 'ตอนนี้โดยเฉลี่ยน้ำหนักของเด็กประมาณ 2.95 กก. และวัดความยาวลำตัวประมาณ 18 – 21 นิ้ว (45.7 ถึง 53.3 ซม.) เด็กได้ยินเสียงจากภายนอกครรภ์ เช่น เสียงพูดคุย เสียงร้องเพลง เป็นต้น ผิวเป็นสีชมพู ผมยาวราว 5 ซม. ไขมันหุ้มตัวเริ่มลอก ระบบสืบพันธุ์พัฒนาเต็มที่ ในเด็กผู้ชาย ลูกอัณฑะจะเลื่อนลงในถุงอัณฑะ และในเด็กผู้หญิง อวัยวะเพศด้านนอกจะปรากฏชัด  ', '38', NULL, NULL),
(39, 39, 'สัปดาห์ที่ 39', 'เด็กในครรภ์มีน้ำหนักประมาณ 2.9 ถึง 4 กก. และ มีลำตัวยาวประมาณ 20-22 นิ้ว (50.8-55.8 ซม.)  ร่างกายของเด็กพัฒนาสมบูรณ์ เด็กหันศีรษะลงอุ้งเชิงกราน ร่างกายสร้างไขปกคลุมผิวหนังหรือไขมันเคลือบผิว เพื่อใช้ปรับอุณหภูมิของร่างกายหลังการคลอด', '39', NULL, NULL),
(40, 40, 'สัปดาห์ที่ 40', 'ในช่วงสุดท้ายของการตั้งครรภ์ โดยเฉลี่ยของเด็กจะมีน้ำหนักประมาณ 3.4 กก. และยาวประมาณ 51 ซม. ตอนนี้เด็กกลับศีรษะแล้ว อยู่ตอนล่างของมดลูกในท่าขดตัวแน่น เตรียมพร้อมสำหรับการคลอด', '40', NULL, NULL),
(41, 41, 'สัปดาห์ที่ 41', 'As cozy as he is, your baby can\'t stay inside you much longer. You\'ll go into labor or be induced soon.', '41', NULL, NULL)";
pg_exec($dbconn, $sql) or die(pg_errormessage());














?>

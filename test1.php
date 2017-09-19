<?php  
$conn_string = "host=ec2-54-163-233-201.compute-1.amazonaws.com port=5432 dbname=dchdrsngrf50pd user=njppbbukwreesq password=c6b890bd6e0dccc4a5db3308869ba5e2735fe0e5df7a3f0de6f114cc24752e04";
$dbconn = pg_pconnect($conn_string);
if (!$dbconn) {
    die("Connection failed: " . mysqli_connect_error());
}


//////////////////////////////////////////////////////////////////////
 $sql="DROP TABLE IF EXISTS history";
 pg_exec($dbconn, $sql) or die(pg_errormessage());
//////////////////////////////////////////////////////////////////////






//*************************
$sql="CREATE TABLE history (
historyid  SERIAL,
date_history DATE,
users text , 
weight varchar(3),
height varchar(3),
PRIMARY KEY(historyid)
)";   
pg_exec($dbconn, $sql) or die(pg_errormessage());
//**************************

///////////////////////////////////////////////////////////////////////////////////////////////////////
// $query = 'select weight from history ';
// $result = pg_query($query);
// while ($row = pg_fetch_row($result)) {
//  $e =  "น้ำหนัก $row[0] ";
// }
// echo $e;
///////////////////////////////////////////////////////////////////////////////////////////////////////




$user = "fdsgaegaeewt5444";
$escaped = pg_escape_string($user);
$height = "33";
$weight = "344";
$sql="INSERT INTO history(date_history,users,weight,height) VALUES(NOW(),$escaped,$weight,$height )";
pg_exec($dbconn, $sql) or die(pg_errormessage());

?>

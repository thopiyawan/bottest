<?php  
$conn_string = "host=ec2-54-163-233-201.compute-1.amazonaws.com port=5432 dbname=dchdrsngrf50pd user=njppbbukwreesq password=c6b890bd6e0dccc4a5db3308869ba5e2735fe0e5df7a3f0de6f114cc24752e04";
$dbconn = pg_pconnect($conn_string);
if (!$dbconn) {
    die("Connection failed: " . mysqli_connect_error());
}

// $sql1 ="CREATE TABLE user (
// user_id varchar(100),
// name varchar(20),
// date_of_birth varchar(20), 
// PRIMARY KEY(user_id)
// )"; 


// pg_exec($dbconn, $sql1) or die(pg_errormessage()); 

// $sql="CREATE TABLE history (
// id_his varchar(5),
// width varchar(20), 
// height varchar(20),
// date_history varchar(20),
// user_id varchar(100),
// PRIMARY KEY(id_his),
// FOREIGN KEY(user_id) REFERENCES user(user_id)
// )";

// $sql="CREATE TABLE History_1 (
// HistoryID varchar(100),
// userID varchar(100), 
// date_history DATE,
// weight INT,
// height INT,
// PRIMARY KEY(HistoryID),
// FOREIGN KEY(userID) REFERENCES user(user_id)
// )";   

//*************************
// $sql="CREATE TABLE history (
// historyid  SERIAL,
// date_history DATE,
// user_id varchar(225), 
// weight varchar(3),
// height varchar(3),
// PRIMARY KEY(historyid)
// )";   
//FOREIGN KEY(userid) REFERENCES users(userid)
// $sql="CREATE TABLE users (
// userid varchar(100),
// name varchar(50),
// date_of_birth DATE,
// PRIMARY KEY(userid)
//)";

// $sql="CREATE TABLE test (
// historyid varchar(100),
// userid varchar(100)
// )";   
 
// pg_exec($dbconn, $sql) or die(pg_errormessage()); 



// pg_exec($dbconn, $sql) or die(pg_errormessage()); 

// $weight = "SELECT weight FROM history ";	  

$result = pg_query($dbconn, "SELECT weight FROM public.history" );
$count = pg_fetch_result($result, 0, 'howManyUsersHaveThisName');
echo $count = '1';


// $height = "33";
// $weight = "344";
// $sql="INSERT INTO history(historyid,date_history,user_id,weight,height) VALUES(historyid,NOW(),$user , $weight, $height )";


// $cd = pg_exec($dbconn, $sql) or die(pg_errormessage());

?>

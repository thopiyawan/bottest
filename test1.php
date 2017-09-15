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
// userid VARCHAR(225), 
// date_history DATE,
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
$user = "U243424324ghjkjhgf";

$sql="INSERT INTO history(userid,date_history,weight,height) VALUES( $user,NOW() , $weight, $height )";
pg_exec($dbconn, $sql) or die(pg_errormessage()); 
// pg_exec($dbconn, $sql) or die(pg_errormessage()); 



// pg_exec($dbconn, $sql) or die(pg_errormessage()); 
?>

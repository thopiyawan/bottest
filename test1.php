<?php  
$conn_string = "host=ec2-54-163-233-201.compute-1.amazonaws.com port=5432 dbname=dchdrsngrf50pd user=njppbbukwreesq password=c6b890bd6e0dccc4a5db3308869ba5e2735fe0e5df7a3f0de6f114cc24752e04";
$dbconn = pg_pconnect($conn_string);
if (!$dbconn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql1 ="CREATE TABLE data_test.user (
id varchar(5),
user_id varchar(100),
name varchar(20),
date_of_birth varchar(20), 
PRIMARY KEY(id)
)"; 


// pg_exec($dbconn, $sql1) or die(pg_errormessage()); 

$sql="CREATE TABLE data_test.history (
id varchar(5),
width varchar(20), 
height varchar(20),
date_history varchar(20),
user_id varchar(100) FOREIGN KEY REFERENCES user(user_id),
PRIMARY KEY(id)
)";


pg_exec($dbconn, $sql) or die(pg_errormessage()); 
?>

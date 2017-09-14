<?php  
$conn_string = "host=ec2-54-163-233-201.compute-1.amazonaws.com port=5432 dbname=dchdrsngrf50pd user=njppbbukwreesq password=c6b890bd6e0dccc4a5db3308869ba5e2735fe0e5df7a3f0de6f114cc24752e04";
$dbconn = pg_pconnect($conn_string);
if (!$dbconn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql="CREATE TABLE test (
id varchar(5),
name varchar(20), 
middle varchar(20),
last varchar(20),
address varchar(50),
expir date,
pass varchar(20),
PRIMARY KEY(id)
)";
pg_exec($dbconn, $sql) or die(pg_errormessage()); 
?>

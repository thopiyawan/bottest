<?php  
$conn_string = "host=ec2-54-163-233-201.compute-1.amazonaws.com port=5432 dbname=dchdrsngrf50pd user=njppbbukwreesq password=c6b890bd6e0dccc4a5db3308869ba5e2735fe0e5df7a3f0de6f114cc24752e04";
$dbconn = pg_pconnect($conn_string);
if (!$dbconn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "CREATE TABLE History (
HistoryID varchar(100),
userID varchar(100), 
weight int(3),
height int(3),
PRIMARY KEY(HistoryID))";
pg_exec($dbconn, $sql) or die(pg_errormessage()); 
?>

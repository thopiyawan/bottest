<?php  
$conn_string = "ec2-54-163-233-201.compute-1.amazonaws.com port=5432 dbname=dchdrsngrf50pd user=njppbbukwreesq password=c6b890bd6e0dccc4a5db3308869ba5e2735fe0e5df7a3f0de6f114cc24752e04";
$dbconn = pg_connect($conn_string);
if (!$dbconn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "CREATE TABLE History(History_ID INT NOT NULL AUTO_INCREMENT,
userID VARCHAR (100),
date_history DATE,
width DOUBLE,
height DOUBLE,
PRIMARY KEY(History_ID)
)";
    
    $dbconn2 = pg_connect($sql);
    
 echo " successfully";

?>

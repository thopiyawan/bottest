<?php  
// $servername = "ec2-54-163-233-201.compute-1.amazonaws.com" ;
// $username = "njppbbukwreesq" ;
// $password = "dc6b890bd6e0dccc4a5db3308869ba5e2735fe0e5df7a3f0de6f114cc24752e04" ;
// $dbname = "dchdrsngrf50pd" ;
// $conn = pg_connect($servername, $username, $password, $dbname);


$conn_string = "host=ec2-54-163-233-201.compute-1.amazonaws.com port=5432 dbname=dchdrsngrf50pd user=njppbbukwreesq password=dc6b890bd6e0dccc4a5db3308869ba5e2735fe0e5df7a3f0de6f114cc24752e04";
$dbconn4 = pg_connect($conn_string);
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// } 

// // sql to create table
// $sql = "CREATE TABLE MyGuests (
// id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
// firstname VARCHAR(30) NOT NULL,
// lastname VARCHAR(30) NOT NULL,
// email VARCHAR(50),
// reg_date TIMESTAMP
// )";

// if ($conn->query($sql) === TRUE) {
//     echo "Table MyGuests created successfully";
// } else {
//     echo "Error creating table: " . $conn->error;
// }

// $conn->close();
?>

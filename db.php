<?php
$Setup_Server = 'localhost';
$Setup_User = 'root';
$Setup_Pwd = '';

$Setup_Database = 'test';

mysql_connect($Setup_Server,$Setup_User,$Setup_Pwd);

mysql_query("use $Setup_Database");
mysql_query("SET NAMES UTF8");

?>

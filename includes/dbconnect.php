<?php
$conn_error = 'Could not Connect. ';

$mysql_host = "localhost";
$mysql_user = "admin";
$mysql_password = "admin";

$mysql_connect = @mysqli_connect($mysql_host, $mysql_user, $mysql_password, $mysqldb);
$mysqldb = 'projectx';

if (!@mysqli_connect($mysql_host, $mysql_user, $mysql_password) || !@mysqli_select_db($mysql_connect, $mysqldb))
{
	die($conn_error);
	
}

?>

<?php
$conn_error = 'Could not Connect. ';

$mysql_host = "";
$mysql_user = "";
$mysql_password = "";

$mysqlconnect = @mysqli_connect($mysql_host, $mysql_user, $mysql_password);
$mysqldb = "";

if (!@mysqli_connect($mysql_host, $mysql_user, $mysql_password) || !@mysql_select_db($mysqlconnect, $mysqldb))
{
	die($conn_error. mysqli_connect_error());
	
}

?>

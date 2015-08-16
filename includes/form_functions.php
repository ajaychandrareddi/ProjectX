<?php

//Code for searchtypes drop-down
function mlSearchType(){
	global $mysql_connect;
	$result = mysqli_query($mysql_connect, "SELECT * FROM SEARCHTYPES") or die(mysql_error());
	echo "<select name='searchtype'>";
	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		echo "<option value='". $row['SEARCHTYPE_ID'] ."'>" .$row['SEARCHTYPE'] ."</option>";
	}
	echo "</select>";

	$result2 = mysqli_query($mysql_connect, "SELECT * FROM STATES") or die(mysql_error());
	echo "<select name='state'>";
	echo '<option value=0>Select State</option>';
	while($row = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {
		echo "<option value='". $row['STATE_ID'] ."'>" .$row['STATE'] ."</option>";
	}
	echo "</select>";

	$result3 = mysqli_query($mysql_connect, "SELECT * FROM CITIES WHERE STATE= " .$row['STATE_ID']) or die(mysql_error());
	echo "<select name='city'>";
	echo '<option value=0>Select City</option>';
	while($row = mysqli_fetch_array($result3, MYSQLI_ASSOC)) {
		echo "<option value='". $row['CITY_ID'] ."'>" .$row['CITY'] ."</option>";
	}
	echo "</select>";
}



?>
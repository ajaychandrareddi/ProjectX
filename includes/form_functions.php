<?php

//Code for searchtypes drop-down
function mlSearchBar(){
	global $mysql_connect;
	$result = mysqli_query($mysql_connect, "SELECT * FROM SEARCHTYPES") or die(mysql_error());
	echo "<select name='searchtype'>";
	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		echo "<option value='". $row['SEARCHTYPE_ID'] ."'>" .$row['SEARCHTYPE'] ."</option>";
	}
	echo "</select>";
	
	$result2 = mysqli_query($mysql_connect, "SELECT * FROM STATES") or die(mysql_error());
	echo "<select name='state' onchange=\"reload(this.form)\">";
		if (empty($_GET['state'])){
			echo '<option value=0 >Select State</option>';
		} else {
			$result2_1 = mysqli_query($mysql_connect, "SELECT STATE FROM STATES WHERE STATE_ID= " .$_GET['state']) or die(mysql_error());
			echo "<option value=" .$_GET['state'] .">";
			while ($row = mysqli_fetch_array($result2_1, MYSQLI_ASSOC)){
				echo $row['STATE'];
			}
			echo "</option>";
		}
	while($row = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {
		echo "<option value='". $row['STATE_ID'] ."'>" .$row['STATE'] ."</option>";
	}
	echo "</select>";

	if (empty($_GET['state'])){
		echo "<select name='city' disable>";
		echo '<option value=0>Select City</option></select>';
	} else {
		$result3 = mysqli_query($mysql_connect, "SELECT * FROM CITIES WHERE STATE= " .$_GET['state']) or die(mysql_error());
		echo "<select name='city'>";
		echo '<option value=0>Select City</option>';
		while($row = mysqli_fetch_array($result3, MYSQLI_ASSOC)) {
			echo "<option value='". $row['CITY_ID'] ."'>" .$row['CITY'] ."</option>";
		}
	echo "</select>";
	}
}
?>
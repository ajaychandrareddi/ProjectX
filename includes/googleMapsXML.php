<?php

include("dbconnect.php");

function parseToXML($htmlStr)
{
	$xmlStr=str_replace('<','&lt;',$htmlStr);
	$xmlStr=str_replace('>','&gt;',$xmlStr);
	$xmlStr=str_replace('"','&quot;',$xmlStr);
	$xmlStr=str_replace("'",'&#39;',$xmlStr);
	$xmlStr=str_replace("&",'&amp;',$xmlStr);
	return $xmlStr;
}

// Select all the rows in the markers table
$result = mysqli_query($mysql_connect, "SELECT * FROM markers");
if (!$result) {
  die('Invalid query: ' . mysql_error());
}

header("Content-type: text/xml");

// Start XML file, echo parent node
echo '<markers>';

// Iterate through the rows, printing XML nodes for each
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
  // ADD TO XML DOCUMENT NODE
  echo '<marker ';
  echo 'name="' . parseToXML($row['NAME']) . '" ';
  echo 'address="' . parseToXML($row['ADDRESS']) . '" ';
  echo 'latitude="' . $row['LATITUDE'] . '" ';
  echo 'longitude="' . $row['LONGITUDE'] . '" ';
  echo 'type="' . $row['TYPE'] . '" ';
  echo '/>';
}

// End XML file
echo '</markers>';

?>
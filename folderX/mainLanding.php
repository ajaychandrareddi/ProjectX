<?php 
session_start();
	include("../includes/dbconnect.php");
	include("../includes/html_codes.php");
	include("../includes/form_functions.php");
	
?>
<!DOCTYPE html>
<html lang="en"> 
  <head>
  	<title>Register</title>
  	<link rel="stylesheet" href="../css/main.css">
  	<link rel="stylesheet" href="../css/forms.css">
  </head>
  <body id="wrapper">
  	<?php headerAndSearchCode(); ?>
  		<section>
  				<form id="generalform" class="container" method="POST" action="">
  				<?php echo @$error_message; ?>
  				<div>
  					<?php mlSearchBar(); ?>
  				</div>
  				  <input type="submit" id="submit" name="submit" value="Submit" class="button">	 
  				  <a href="advancedsearch.php">Advanced Search</a>			
  				</form>
  			</section>
  	<?php footerCode(); ?>
  </body>
 </html>
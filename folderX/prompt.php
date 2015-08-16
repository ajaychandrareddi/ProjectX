<?php
session_start();
	include("../includes/html_codes.php");
	
	$msg = $_GET['msg'];
	
	function createMessage($msg){
		if (is_numeric($msg)){
		 	switch ($msg){
		 		case 0:
		 			$message = "Your Account is now active. You may now <a href=\"login.php\">Login</a>";
		 			break;
		 		case 1:
		 			$message = "Thank you for registering! A confirmation email has been sent to your email. Please click on the activation link to activate your account.";
		 			break;
		 		case 2:
		 			$message = "Username or Email Address has already been registered. Pleae use different Username and/or Email";
		 			break;
		 		case 3:
		 			$message = "An email has been sent with a link to reset your password.";
		 	}
		echo $message;
		}
	}
?>

<!DOCTYPE html>
<html lang="en"> 
  <head>
  	<title>Register</title>
  	<link rel="stylesheet" href="../css/main.css">
  	<link rel="stylesheet" href="../css/prompt.css">
  </head>
  <body id="wrapper">
  	<?php headerAndSearchCode(); ?>
  		<div id="outer">
  			<div id="inner">
  				<?php createMessage($msg); ?>
  			</div>
  		</div>
  	<?php footerCode(); ?>
  </body>
 </html>
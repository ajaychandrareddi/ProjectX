<?php 
session_start();
    include("../includes/dbconnect.php");
	include("../includes/html_codes.php");
	
	if (isset($_POST['submit'])){
		
		//email check
		if (empty($_POST['email'])){
			$error[] = 'Please enter Email. ';
		} else if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
			$email = mysqli_real_escape_string($mysql_connect, $_POST['email']);
		} else {
			$error[] = 'Your Email address is invalid. ';
		}
		
		if (empty($error)){
			$result = mysqli_query($mysql_connect, "SELECT * FROM USERS WHERE EMAIL='$email'");
			if (mysqli_num_rows($result) > 0){
				$activation = md5(uniqid(rand(), true));
				while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
					$user_id = $row['user_id'];
				}
				$result2 = mysqli_query($mysql_connect, "UPDATE USERS SET ACTIVATION = '$activation' AND UPDATED_TIMESTAMP = now()");
				if (!$result2){
 					die('Could not update into database: ' .mysqli_error($mysql_connect));
 				} else {
 					$message = "Hi ". $user_id. ", \n\n";
 					$message = "To reset your account, please click on the link: \n\n";
// PROPER URL SHOULD BE GIVEN HERE
					$message = "http://localhost:8080/ajaychandrareddi". '/reactivate.php?email='.urlencode($email). "&key=$activation";
 					mail($email, 'Reset Password for StreetView', $message);
 					header('Location: Prompt.php?msg=3');
 				}
 			 } else { 
 			 header('Location: Prompt.php?msg=3');
 			 }
		} else {
 			$error_message = '<span class="error">';
 				foreach ($error as $key => $values){
 				$error_message .= "$values";
 				}
 				$error_message .= '</span><br></br>'; 
 		}
	}
?>
<!DOCTYPE html>
<html lang="en"> 
  <head>
  	<title>Register</title>
  	<link rel="stylesheet" href="../css/main.css">
  	<link rel="stylesheet" href="../css/forms.css">
  	<link rel="stylesheet" href="../css/forgotpassword.css">
  </head>
  <body id="wrapper">
  	<?php headerAndSearchCode(); ?>
  			<div>
  			<aside id="left_side">
  				<img src="C:/Xampp/htdocs/ProjectX/images/login.png">
  			</aside>
  			<section id="right_side">
  				<form id="generalform" class="container" method="POST" action="">
  				<h3>Don't know your password?</h3>
  				<h2>Enter your email address and we'll send you a link to set your password.</h2>
  				<?php echo @$error_message; ?>
  					<div class="field">
  						<input type="text" id="email" name="email" class="input" placeholder="Enter Email" maxlength="80">
  					</div>
  				  <input type="submit" id="submit" name="submit" value="Submit" class="button">	 
  				  Know your password?<a href="login.php">Login now</a>			
  				</form>
  			</section>
  		</div>
  	<?php footerCode(); ?>
  </body>
 </html>
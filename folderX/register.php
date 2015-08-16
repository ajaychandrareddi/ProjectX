<?php

 session_start();
 	
 	include("../includes/dbconnect.php");
 	include("../includes/html_codes.php");
 	
if (isset($_POST['submit']))
 {
 		$error = array();
 		
 		//username check
 		if (empty($_POST['username'])){
 			$error[] = 'Please enter Username. ';
 		} else if (ctype_alnum($_POST['username'])){
 			$username = $_POST['username'];
 		} else {
 		  	$error[] = 'Username must have letters and numbers only. ';
 		}
 		
 		//email check
 		if (empty($_POST['email'])){
 			$error[] = 'Please enter Email. ';
 		} else if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
 			$email = mysqli_real_escape_string($mysql_connect, $_POST['email']);
 		} else {
 			$error[] = 'Your Email address is invalid. ';
 		}
 		
 		//password check
 		if (empty($_POST['password'])){
 			$error[] = 'Please enter Password. ';
 		} else {
 			$password = mysqli_real_escape_string($mysql_connect, $_POST['password']);
 		}
 		
 		//Industry Professional Check
 		if (isset($_POST['role'])){
 			$role = '3';
 		} else {
 			$role = '2';
 		}
  
 		if (empty($error))
 		{
 			$result = mysqli_query($mysql_connect, "SELECT * FROM TEMPUSERS WHERE USERNAME='$username' OR EMAIL='$email'") or die(mysql_error());
 			if (mysqli_num_rows($result) == 0){
 				$activation = md5(uniqid(rand(), true));
 				$options = [
 						'cost' => 8,
 				];
 				$password = password_hash($password, PASSWORD_BCRYPT, $options)."\n";
 				$result2 = mysqli_query($mysql_connect,"INSERT INTO tempusers (USERNAME, ROLE, EMAIL, PASSWORD, ACTIVATION, UPDATED_TIMESTAMP, CREATED_TIMESTAMP) VALUES ('$username', '$role', '$email', '$password', '$activation', now(), now())");
 				if (!$result2){
 					die('Could not insert into database: ' .mysqli_error($mysql_connect));
 				} else {
 					$message = "To activate your account, please click on the link: \n\n";
 // PROPER URL SHOULD BE GIVEN HERE
 					$message = "http://localhost:8080/ajaychandrareddi". '/activate.php?email='.urlencode($email). "&key=$activation";
 					mail($email, 'Registration Confirmation for StreetView', $message);
 					header('Location: Prompt.php?msg=1');
 				}
 			} else {
 				header('Location: Prompt.php?msg=2');
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
  	<link rel="stylesheet" href="../css/registration.css">
  </head>
  <body id="wrapper">
  	<?php headerAndSearchCode(); ?>
  		<div>
  			<aside id="left_side">
  				<img src="C:/Xampp/htdocs/ProjectX/images/Registration.png">
  			</aside>
  			<section id="right_side">
  				<form id="generalform" class="container" method="POST" action="">
  				<h3>Welcome To StreetView</h3>
  				<h4>New Account</h4>
  				<?php echo @$error_message; ?>
  					<div class="field">
  						<input type="text" id="username" name="username" class="input" placeholder="Enter Username" maxlength="20">
  						<p class="hint">20 characters maximum (letters and numbers only)</p>
  					</div>
   					<div class="field">
  						<input type="text" id="email" name="email" class="input" placeholder="Enter Email" maxlength="80">
  					</div>
   					<div class="field">
  						<input type="password" id="password" name="password" class="input" placeholder="Enter Password"  maxlength="20">
  						<p class="hint">20 characters maximum</p>
  					</div>
  					<div class="field">
  					    <input type="checkbox" id="role" name="role" class="checkbox">
  					    <label for="role">I am an Industry Professional</label>
  					</div><br/>
  				  <input type="submit" id="submit" name="submit" value="Submit" class="button">	 					
  				</form>
  			</section>
  		</div>
  	<?php footerCode(); ?>
  </body>
 </html>
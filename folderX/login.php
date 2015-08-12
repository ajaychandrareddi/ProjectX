<?php 
session_start();

	include("../includes/html_codes.php");
	
if (isset($_POST['submit']))
	{
		$error = array();
		
		//username check
		if (empty($_POST['username'])){
			$error[] = 'Please enter username. ';
		} else if (ctype_alnum($_POST['username'])){
			$username = $_POST['username'];
		} else {
			$error[] = 'Username should have letters and numbers only. ';
		}
		
		//password check
		if (empty($_POST['password'])){
			$error[] = 'Please enter password. ';
		} else {
			$password = $_POST['password'];
		}
	
		if (empty($error)){
		// Here goes code to navigate to next page
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
  	<link rel="stylesheet" href="../css/login.css">
  </head>
  <body id="wrapper">
  	<?php headerAndSearchCode(); ?>
		<div>
  			<aside id="left_side">
  				<img src="C:/Xampp/htdocs/ProjectX/images/login.png">
  			</aside>
  			<section id="right_side">
  				<form id="generalform" class="container" method="POST" action="">
  				<h3>Welcome to PreLaunch Buzzzzz!...</h3>
  				<?php echo @$error_message; ?>
  					<div class="field">
  						<label for="username">Username: </label>
  						<input type="text" id="username" name="username" class="input"  maxlength="20">
  					</div>
   					<div class="field">
  						<label for="password">Password: </label>
  						<input type="password" id="password" name="password" class="input"  maxlength="20">
  					</div>
  				  <input type="submit" id="submit" name="submit" value="Submit" class="button">	 
  				  <a href="forgotpassword.php">Don't Know Your Password?</a>			
  				</form>
  			</section>
  		</div>
  	<?php footerCode(); ?>
  </body>
 </html>
<?php 
session_start();
	include("../includes/dbconnect.php");
	include("../includes/html_codes.php");
	
if (isset($_POST['submit'])){
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
			$result = mysqli_query($mysql_connect, "SELECT * FROM TEMPUSERS WHERE USERNAME='$username'") or die(mysql_error());
			if (mysqli_num_rows($result)==1){
				    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
					$_SESSION['user_id'] = $row['USER_ID'];
					$hash = trim($row['PASSWORD']);
				    }
				    if (password_verify($password, $hash)){
				    	header('Location:mainLanding.php');
				    } else
				    	$error_message = '<span class="error">Password is Incorrect. </span> <br/><br/>';
			} else {
				$error_message = '<span class="error">Username or Password is Incorrect. </span> <br/><br/>';
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
  				<h3>Welcome to StreetView</h3>
  				<h4>Login</h4>
  				<?php echo @$error_message; ?>
  					<div class="field">
  						<input type="text" id="username" name="username" class="input" placeholder="Enter Username" maxlength="20">
  					</div>
   					<div class="field">
  						<input type="password" id="password" name="password" class="input" placeholder="Enter Password"  maxlength="20">
  					</div><br/>
  				  <input type="submit" id="submit" name="submit" value="Submit" class="button">	 
  				  <a href="forgotpassword.php">Don't Know Your Password?</a>			
  				</form>
  			</section>
  		</div>
  	<?php footerCode(); ?>
  </body>
 </html>
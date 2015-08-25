

<?php 
session_start();
	include("../includes/dbconnect.php");
	include("../includes/CopyOfhtml_codes.php");
	include("../includes/form_functions.php");
	
?>

<!DOCTYPE html>
<html lang="en"> 
	<SCRIPT>
	function reload(form)
	{
		var state=form.state.options[form.state.options.selectedIndex].value;
		self.location='mainLanding.php?state=' + state ;
	}
</script>
  <head>
  	<title>Register</title>
  	<link rel="stylesheet" href="../css/Copy of main.css">
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
 
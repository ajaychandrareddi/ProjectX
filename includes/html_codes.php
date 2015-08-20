<?php

//Code for Header and Search bar
function headerAndSearchCode(){
    echo '
		<header id="main_header">
			<div id="rightAlign">
		';
	topRightLinks();
	echo "
			</div>
		<div id='cssmenu'>
			<ul>
			   <li class='active has-sub'><a href='#'><span>Buy</span></a>
				  <ul>
			         <li class='has-sub'><a href='#'><span>Product 1</span></a>
			         </li>
			      </ul>
			   </li>
			   <li class='active has-sub'><a href='#'><span>Sell</span></a>
			      <ul>
			         <li class='has-sub'><a href='#'><span>Product 1</span></a>
			         </li>
			      </ul>
			   </li>
			   <li class='active has-sub'><a href='#'><span>Rent</span></a>
				  <ul>
			         <li class='has-sub'><a href='#'><span>Product 1</span></a>
			         </li>
			      </ul>
			   </li>
			   <li class='active has-sub'><a href='#'><span>Home Loans</span></a>
				  <ul>
			         <li class='has-sub'><a href='#'><span>Product 1</span></a>
			         </li>
			      </ul>
			   </li>
			   <li class='active has-sub'><a href='#'><span>Find an Agent</span></a>
				  <ul>
			         <li class='has-sub'><a href='#'><span>Product 1</span></a>
			         </li>
			      </ul>
			   </li>
			   <li class='active has-sub'><a href='#'><span>More</span></a>
				  <ul>
			         <li class='has-sub'><a href='#'><span>Product 1</span></a>
			         </li>
			      </ul>
			   </li>
			</ul>
		</div>
		";
}

//Code for Footer bar
function footerCode(){
	echo '
			<footer id="main_footer">
				<table>
					<tr>
						<td>link1</td>
						<td>link2</td>
						<td>link3</td>
					</tr>
				</table>
			</footer>
			';
}

//Code for Top Right Links
function topRightLinks(){
	if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])){
			echo '<a href="register.php">Register</a> | <a href="login.php">Login</a>';
			} else {				
			$user_id = $_SESSION['user_id'];
			echo '<a href="myAccount.php">My Account</a> | <a href="logout.php">Logout</a>';
			}
}

?>
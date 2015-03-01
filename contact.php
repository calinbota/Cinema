<?php
    session_start();
?>

<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
	<meta charset="UTF-8" />
	<title>Contact Us - Contact</title>
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<!--[if IE 9]>
		<link rel="stylesheet" type="text/css" href="css/ie9.css" />
	<![endif]-->
	<!--[if IE 8]>
		<link rel="stylesheet" type="text/css" href="css/ie8.css" />
	<![endif]-->
	<!--[if IE 7]>
		<link rel="stylesheet" type="text/css" href="css/ie7.css" />
	<![endif]-->
</head>
<body>
	<div id="header">
		<div>
			<div id="logo">
				<a href="index.html"><img src="images/logo_cinema.gif" alt="Logo" /></a>
			</div>
			<div id="navigation">
				<div>
					<ul>
						<li><a href="index.php">Home</a></li>
						<li class="current"><a href="contact.php">Contact</a></li>
						<li><a href="listafilme.php">Details</a></li>
						<?php  
				if (!isset($_SESSION['email'])) { ?>
					<li><a href="login.php"><span>Login</span></a></li>
				<?php } else { ?>
					<li><a href="logout.php"><span>Logout</span></a></li>
					
			<?php } ?>
				
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div id="content">
		<div>
			<h3>Pentru orice nelamurire trimiteti un mail</h3>
			<form action="mailto:cinema@cinema.ro">
				<table>
					<tr>
						<td><label for="name"><strong>Name:<strong></label></td>
						<td><input type="text" maxlength="30" id="name" /> </td>
						<td><label class="email" for="email">Email:</label></td> 
						<td><input type="text" maxlength="30" id="email" /></td>
					</tr>
					<tr>
						<td><label for="subject"><strong>Subject:</strong></label></td>
						<td><input type="text" maxlength="30" id="subject" /></td>
					</tr>
					<tr>
						<td class="message"><label for="message"><strong>Message:</strong></label></td>
						<td colspan="3"><textarea name="message" id="message" cols="10" rows="5"></textarea></td>
					</tr>
					<tr>
						<td></td>
						<td colspan="2"><label class="newsletter" for="newsletter"><input type="checkbox" id="newsletter" /><span> Subscribe to newsletter</span></label> <label for="terms"><input type="checkbox" id="terms" /><span> I agree to the Terms and Conditions</span></label></td>
						<td colspan="1"><input type="submit" value="" id="send" /></td>
					</tr>
					<div class="location" style="width: 900px; height: 350px;"></div><br />
			
				</table>
			</form>

			
		</div>
	</div>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="js/scripts.js"></script>
<script src="js/location.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
</body>
</html>
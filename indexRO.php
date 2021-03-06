<?php
    session_start();
?>
<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
	<meta  WebSite</charset="UTF-8" />
	<title>Cinematitle</title>
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	  <script src="js/cookies.js"></script>
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
				<a href="index.php"><img src="images/logo_cinema.gif" alt="Logo" /></a>
			</div>
			<div id="navigation">
				<div>
					<ul>
						<li class="active"><a href="indexRO.php">Acasa</a></li>
						<li><a href="contact.php">Contact</a></li>
						<li><a href="listafilme.php">Detalii filme</a></li>
						<li><a href="login.php">Logare</a></li>
						<li><a href="index.php">Inregistrare</a></li>
					</ul>
				</div>
				
			</div>
			<select id="languageSelected" onchange="changeCookie();">
				<option value="ro">Ro</option>
				<option value="en">En</option>
			</select>
		</div>
		
	</div>
	
	<div id="content">
		<div id="section">
			<div>
				<h1>Cinema City!</h1>
				<p>Design and implement a web based application for a Cinema. <BR>The application should have the following 
functionalities: <BR>
 language selection (RO and EN) <BR>
 view Cinema info <BR>
 list available movies in the Cinema in user friendly manner <BR>
 show movie details (dates, hours, poster, description, genre, etc.) <BR>
 view movie trailer <BR>
 contact form <BR>
 track users with cookies  <BR>
</p>				
			</div>
			<div id="figure">
				<a href="index.html"><img src="images/salle-cinema.jpg" alt="Image" /></a>
				<span></span>
			</div>
			<span class="background"></span>
		</div>
		
	</div>
	<div i
			
			
			
		</div>
	</div>
</body>
</html>
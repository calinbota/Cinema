<?php
    session_start();
    include 'functions.php';
    if (isset($_POST['book'])) {

    }
?>
<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
	<meta  WebSite</charset="UTF-8" />
	<title>Cinematitle</title>
	<link rel="stylesheet" type="text/css" href="css/style.css" />
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

	 <script src="js/book.js"></script>
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
						
						<li><a href="index.php">Home</a></li>
						<li><a href="contact.php">Contact</a></li>
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
	
	<div id="templatemo_main">

			<h2>Book tickets</h2>
			<?php if (isset($_SESSION['email'])) { ?>	
				<div style="height:200px" class="book">
					<div class="booking">										
										
					</div>
					<button type="submit" id="book_button" onclick="bookTicket(<?php echo "'" . $_SESSION['email'] ."'" . "," . $_GET['id'] ?>)">Book ticket</button>	
				</div>
				<div class="cleaner"></div>
				<div id="booking-result"></div>
			<?php } ?>
			<div class="cleaner"></div>
</div> 
	<script type="text/javascript" src="js/book.js"></script>
</body>
</html>

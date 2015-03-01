<?php
    session_start();
    include 'functions.php';
    
?>
<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
	<meta  WebSite</charset="UTF-8" />
	<title>Cinematitle</title>
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
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
						
						<li><a href="index.php">Home</a></li>
						<li><a href="contact.php">Contact</a></li>
						<li><a href="listafilme.php">Details</a></li>
						<?php  
				if (!isset($_SESSION['email'])) { ?>
					<li><a href="login.php"><span>Login</span></a></li>
				<?php } else { ?>
					<li><a href="logout.php"><span>Logout</span></a></li>
					<?php if ($_SESSION['role'] == 1) { ?>
						<li><a href="http://localhost/cgi-bin/admin.cgi"><span>Admin</span></a></li>
					<?php } ?>
			<?php } ?>
						
					</ul>
				</div>
				
			</div>
			
		</div>
		
	</div>
	
	<div id="templatemo_main">

			<h2>Reviews</h2>
			<?php if (isset($_SESSION['email'])) { ?>
				<div style="height:250px" class="review">
				  <div id="text-review" class="text-review">
					<?php 
					  $rev = retrieveReviews($_GET['id']);
					  if (isset($rev)) {
						foreach($rev as $r) {
						  echo "<p><span>" . $r['user'] . " said on " . $r['date'] . " : </span>". $r['review'] ."</p>";
						}
					  }
					?>
				  </div>
				  <textarea id="textarea" rows="4" cols="50"></textarea>
				  <br />
				  
				  <button type="submit" id="book_button" onclick="postReview(<?php echo "'" . $_SESSION['email'] ."'" . "," . $_GET['id'] ?>)">Post</button>
				</div>
			<?php } ?>
			<div class="cleaner"></div>
</div> <!-- END of templatemo_main -->
	<script type="text/javascript" src="js/review.js"></script>
</body>
</html>

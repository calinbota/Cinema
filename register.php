<?php
    session_start();
	include 'functions.php';
	if (isset($_POST['register'])) {
	if(strcmp($password1, $password2)==0){
		register($_POST['name'], $_POST['email'], $_POST['password1'], $_POST['address'], $_POST['phone']);
		}else{
			$error['register']  = "Invalid credentials";
		}	
	}
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
						
						<li><a href="index.php">Home</a></li>
						<li><a href="contact.php">Contact</a></li>
						<li><a href="listafilme.php">Details</a></li>
						<li><a href="login.php">Log In</a></li>
						<li class="current"><a href="register.php">Register</a></li>
						
						
					</ul>
				</div>
				
			</div>
			
		</div>
		
	</div>
	
	<div id="templatemo_main">
	
    <h2>Create a new account!</h2>
        <div class="half float_l">
            <div id="contact_form">
               <form method="post" name="contact" action="register.php" method="post">
                        
						<label for="author">Email:</label> <input type="text" name="email" class="required input_field" />
                        <div class="cleaner h10"></div>
						
                        <label for="author">Name:</label> <input type="text" name="name" class="required input_field" />
                        <div class="cleaner h10"></div>
						
						<label for="author">Address:</label> <input type="text" name="address" class="required input_field" />
                        <div class="cleaner h10"></div>
						
						<label for="subject">Password:</label> <input type="password" name="password1" class="required input_field" />
						<div class="cleaner h10"></div>
			
						
                        <input type="submit" value="Sign up" name="register" class="submit_btn float_l"/>
						<div class="cleaner h10"></div>
                        
            	</form>
				<?php 
					if (isset($error['register'])) { 
						echo "<p style='color: red'>".$error['register']."</p>";
					} 
				?>
            </div>
		</div>        
        <div class="cleaner h40"></div>		
	
    <div class="cleaner"></div>
</div> 

	
	
</body>
</html>
<?php
    session_start();
?>
<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
	<meta charset="UTF-8" />
	<title>Lista Filme</title>
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
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
						<li><a href="contact.php">Contact</a></li>
						<li class="current"><a href="listafilme.php">Details</a></li>
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
		<h1><strong>Available movies<strong></h1>
		<div class="movies">	
			<script type="text/javascript">
                    if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
                        xmlhttp = new XMLHttpRequest();
                    }
                    else {// code for IE6, IE5
                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                    }
                    xmlhttp.open("GET", "xml/filme.xml", false);
                    xmlhttp.send();
                    xmlDoc = xmlhttp.responseXML;
                    var table = document.createElement("table");
                    
                    var x = xmlDoc.getElementsByTagName("film");
                    for (i = 0; i < x.length; i++) {
                        table.appendChild(addMovieRow(x[i]));
						
                    }
                    document.getElementsByClassName('movies')[0].appendChild(table);

                </script>
		</div>
	</div>
	
	
</body>
</html>
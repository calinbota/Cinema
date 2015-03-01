<?php
    session_start();
	include 'functions.php';
    if (isset($_POST['email']) && isset($_POST['password'])){
		$con = mysqlConnect();
        if ($id = verifyUser($con, $_POST['email'], $_POST['password'])) {
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['id'] = $id;
            mysqlClose($con);
            header( 'Location: index.php' ) ;
        } else {
            $error['login']  = "Invalid username or password";
        }
        mysqlClose($con);
	}
	
?>
<?php if (!isset($_SESSION['email'])) { ?>
<html xmlns:fb="http://www.facebook.com/2008/fbml">
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
						
						<?php  
				if (!isset($_SESSION['email'])) { ?>
					<li><a href="login.php" class="selected"><span>Login</span></a></li>
				<?php } else { ?>
					<li><a href="logout.php"><span>Logout</span></a></li>
				<?php } ?>	
						
					</ul>
				</div>
				
			</div>
			
		</div>
		
	</div>
	
	<div id="templatemo_main">
	
    <h2>Login </h2>
        <div class="half float_l">
            <div id="contact_form">
               <form method="post" name="contact">
                        
                        <label for="author">Email:</label> <input type="text" name="email" class="required input_field" />
                        <div class="cleaner h10"></div>
                        
						<label for="subject">Password:</label> <input type="password" name="password" id="password" class="input_field" />
						<div class="cleaner h10"></div>

						 <input type="submit" value="Log in" id="login" name="login" class="submit_btn float_l" />
						<div class="cleaner h10"></div>

						<script>
                            window.fbAsyncInit = function () {
                                FB.init({
                                    appId: '1377291025894059',
                                    secret: '01abfc08b005982547d86774b8b80512',
                                    status: true, // check login status
                                    cookie: true, // enable cookies to allow the server to access the session
                                    xfbml: true  // parse XFBML
                                });

                                // Here we subscribe to the auth.authResponseChange JavaScript event. This event is fired
                                // for any authentication related change, such as login, logout or session refresh. This means that
                                // whenever someone who was previously logged out tries to log in again, the correct case below
                                // will be handled.
                                FB.Event.subscribe('auth.authResponseChange', function (response) {
                                    // Here we specify what we do with the response anytime this event occurs.
                                    if (response.status === 'connected') {
                                        // The response object is returned with a status field that lets the app know the current
                                        // login status of the person. In this case, we're handling the situation where they
                                        // have logged in to the app.
                                        testAPI();
                                    } else if (response.status === 'not_authorized') {
                                        // In this case, the person is logged into Facebook, but not into the app, so we call
                                        // FB.login() to prompt them to do so.
                                        // In real-life usage, you wouldn't want to immediately prompt someone to login
                                        // like this, for two reasons:
                                        // (1) JavaScript created popup windows are blocked by most browsers unless they
                                        // result from direct interaction from people using the app (such as a mouse click)
                                        // (2) it is a bad experience to be continually prompted to login upon page load.
                                        FB.login();
                                    } else {
                                        // In this case, the person is not logged into Facebook, so we call the login()
                                        // function to prompt them to do so. Note that at this stage there is no indication
                                        // of whether they are logged into the app. If they aren't then they'll see the Login
                                        // dialog right after they log in to Facebook.
                                        // The same caveats as above apply to the FB.login() call here.
                                        //FB.login();
                                    }
                                });
                            };

                            // Load the SDK asynchronously
                            (function (d) {
                                var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
                                if (d.getElementById(id)) {
                                    return;
                                }
                                js = d.createElement('script');
                                js.id = id;
                                js.async = true;
                                js.src = "//connect.facebook.net/en_US/all.js";
                                ref.parentNode.insertBefore(js, ref);
                            }(document));

                            // Here we run a very simple test of the Graph API after login is successful.
                            // This testAPI() function is only called in those cases.
                            function testAPI() {
                                console.log('Welcome!  Fetching your information.... ');
                                FB.api('/me', function (response) {

                                    setSession(response.email);
                                    console.log('Good to see you, ' + response.email + '.');
                                    $('#loginWithFacebookDiv').hide();
                                    $('#logoutWithFacebookDiv').show();
                                });
                            }

                            function logout() {
                                FB.logout(function (response) {
                                });
                                $('#loginWithFacebookDiv').show();
                                $('#logoutWithFacebookDiv').hide();
                                $.ajax({
                                    url: "logout.php",
                                    type: "GET"
                                });
                            }

                            function setSession(name) {
                                $.ajax({
                                    url: "setSession.php",
                                    type: "GET",
                                    data: { name: name }
                                });
                            }

                            $(function () {
                                $('#loginWithFacebookDiv').show();
                                $('#logoutWithFacebookDiv').hide();
                            });
                        </script>
                        
                        <div id="loginWithFacebookDiv">
                            <fb:login-button show-faces="true" width="200" max-rows="1"></fb:login-button>
                        </div>
                        <div id="logoutWithFacebookDiv">
                            <input type="button" value="Logout" onclick="logout()">
                        </div>
						
						<?php 
							if (isset($error['login'])) { 
								echo "<p style='color: red'>".$error['login']."</p>";
							} 
						?>
						<div class="cleaner h10"></div>
						<h6><strong>Don't have an account yet? Please register!</strong></h6>
						<div class="cleaner h10"></div>
						<a href="register.php">
							<button type="button" class="submit_btn float_l">Register</button>
						</a>
                        
            	</form>
            </div>
		</div>        
        <div class="cleaner h40"></div>
    
    <div class="cleaner"></div>
</div> <!-- END of templatemo_main -->
	
	<script src="js/scripts.js"></script>
</body>
</html>
<?php } else 
    header( 'Location: index.php' ) ;
?>

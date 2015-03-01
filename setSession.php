<?php
	$name= strval($_GET['name']);
	

    //initalize session
    session_start();

    $_SESSION['email'] = $name;
    $_SESSION['id'] = 1;
?>
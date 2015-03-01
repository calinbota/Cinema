<?php
include 'functions.php';
$con = mysqlConnect();


insertBooking($con, $_POST['user'], $_POST['movie'], $_POST['nr'], $_POST['date'], $_POST['hour']);
$msg = "Your booking has been made.";
$msg = wordwrap($msg,70);
mail($_POST['user'], "Ticket booking", $msg);

echo "<p style='color: red'> Your booking has been made. You will soon receive a confirmation e-mail. Thank you! </p>";
?>
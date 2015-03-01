<?php
include 'functions.php';
$con = mysqlConnect();

insertRating($con, $_POST['movieid'], $_POST['userid'], $_POST['value']);
?>
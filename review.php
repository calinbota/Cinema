<?php
include 'functions.php';
$con = mysqlConnect();

insertReview($con,  $_POST['mid'], $_POST['q'], $_POST['date'], $_POST['uid']);
echo "<p><span>" . $_POST['uid'] . " said on " . $_POST['date'] . " : </span>". $_POST['q'] ."</p>";
?>
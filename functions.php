<?php

function mysqlConnect()
{
	$con=mysqli_connect("localhost", "root","admin","daw");

    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }

    return $con;
}

function mysqlClose($con)
{
	 mysqli_close($con);
}
function verifyUser($con, $email, $password)
{
	$result = mysqli_query($con,"SELECT id, email, password FROM user");

	while($row = mysqli_fetch_array($result)) {
		if ($row['email'] == $email && $row['password'] == $password) {
			return $row['id'];
		}
	}
	return false;
}

function insertUser($con, $email, $name, $address, $password)
{
	mysqli_query($con, "INSERT INTO user (email, name, address, password)
								VALUES ('$email', '$name', '$address',  '$password')"
				);
}

function register($email, $name, $address,  $password1 ){

        $con = mysqlConnect();		
		insertUser($con, $_POST['email'], $_POST['name'], $_POST['address'],  $_POST['password1']);
		mysqlClose($con);
		header( 'Location: login.php' ) ;
}		
function insertBooking($con, $userid, $movieid, $no, $date, $hour){

	$result = mysqli_query($con, "SELECT * FROM user WHERE email='" . $userid. "'");
	while($row = mysqli_fetch_array($result)) {
		$id = $row['id'];		
	}
	
	mysqli_query($con, "INSERT INTO bookings (userid, movieid, date, hour, noOfPersons)
								VALUES ('$id', '$movieid', '$date', '$hour', '$no')"
				);
				
}
function insertReview($con,  $movieid, $content, $date, $userid){

	$result = mysqli_query($con, "select * from user WHERE email='" . $userid. "'");
	while($row = mysqli_fetch_array($result)) {
		$id = $row['id'];		
	}

	mysqli_query($con, "insert into  reviews (movieid, content, date, userid)
								VALUES ( '$movieid', '$content', '$date', '$id')"
				);

}
function retrieveReviews($movieid){
	
	$con = mysqlConnect();
	$result = mysqli_query($con,"SELECT * FROM reviews WHERE movieid=".$movieid);
	$res = array();
	$i = 0;
	
	while($row = mysqli_fetch_array($result)) {
		$result2 = mysqli_query($con, "SELECT * FROM user WHERE id='" . $row['userid'] . "'");
		
		$row2 = mysqli_fetch_array($result2);
		$res[$i]['review'] = $row['content'];
		$res[$i]['date'] = $row['date'];
		$res[$i]['user'] = $row2['email'];
		$i++;
	}

	mysqlClose($con);
	return $res;
}

function insertRating($con, $movieid, $userid, $value){

	$result = mysqli_query($con, "SELECT * FROM user WHERE email='" . $userid. "'");
	while($row = mysqli_fetch_array($result)) {
		$id = $row['id'];		
	}
	
	mysqli_query($con, "INSERT INTO ratings (movieid, userid, value)
								VALUES ('$movieid', '$userid', '$value')"
				);
}
?>
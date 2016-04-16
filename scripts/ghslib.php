<?php

function dbConnect(){
	$user = "root";
	$pass = "furjobs30";
	$host = "localhost";
	$db = "ghs";

	$con = new mysqli($host, $user, $pass, $db);
	if ($con->connect_error){
		die("Connection Failed: " . $con->connect_error());
	}
	return $con;
}

function condition($input){
	$input =trim($input);
	$input = stripslashes($input);
	$input = htmlspecialchars($data);
	return $input;
}



?>

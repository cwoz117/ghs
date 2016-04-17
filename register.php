<!DOCTYPE html>
<head>
	<link rel="stylesheet" type="text/css" href="../styles/ghs_style.css">
	<title>Registeration</title>
	<?php require 'ghslib.php';?>
</head>
<body>
	<?php require "header.php";?>
<div class="content">
	<?php 
	require "nav.php";
	$con = dbConnect();

	$uname = $_POST['uname'];
	$password = $_POST['pass'];
	$email = condition($_POST['email']);
	$fname = condition($_POST['fname']);
	$middleinit = condition($_POST['mname']);
	$lname = condition($_POST['lname']);
		//$bday = condition($_POST['bday']);
	$address = condition($_POST['address']);
	$phone = condition($_POST['phone']);

	echo $uname;

	$stmt = $con->prepare("INSERT INTO Users (Address, FirstName, MiddleInitial, LastName, Username, Password, Email, phoneNumber)
			       VALUES (?, ?, ?, ?, ?, ?, ?, ?);");
	$stmt->bind_param("ssssssss", $address,$fname,$middleinit,$lname,$uname,$password,$email,$phone);
	if ($stmt){
		echo "query ok <br>";
	} else {
		die("Query error<br>");
	}

	$stmt->execute();

	if ($stmt){
		echo "Registration Successful";
	}else {
		echo "Error During Registration";
	}


	$con->close();
	require "footer.php";
	?>
</div>
</body>
</html>

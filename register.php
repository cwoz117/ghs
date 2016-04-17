<!DOCTYPE html>
<head>
	<link rel="stylesheet" type="text/css" href="styles/ghs_style.css">
	<title>Registeration</title>
	<?php require 'ghslib.php';?>
</head>
<body>
	<?php require "header.php";?>
<div class="content">
	<?php 
	require "nav.php";
	$con = dbConnect();

	// Condition (eventually validate) input
	$uname 		= condition($_POST['uname']);
	$password	= condition($_POST['pass']);
	$email 		= condition($_POST['email']);
	$fname 		= condition($_POST['fname']);
	$middleinit 	= condition($_POST['mname']);
	$lname 		= condition($_POST['lname']);
	//$bday = condition($_POST['bday']);
	$address 	= condition($_POST['address']);
	$phone 		= condition($_POST['phone']);

	$cardno		= condition($_POST['cardno']);
	$cardname	= condition($_POST['cardname']);
	$expdate	= condition($_POST['expdate']);


	// Add info to Users
	$stmt = $con->prepare("INSERT INTO Users (Address, FirstName, MiddleInitial, LastName, Username, Password, Email, phoneNumber)
			       VALUES (?, ?, ?, ?, ?, ?, ?, ?);");
	$stmt->bind_param("ssssssss", $address,$fname,$middleinit,$lname,$uname,$password,$email,$phone);
	$stmt->execute();
	$stmt->close();
	
	// Get generated AccountID number for payment foreign key.
	$stmt = $con->prepare("SELECT AccountId FROM Users where Username=?;");
	$stmt = bind_param("s", $uname);
	$stmt = bind_result($accountId);
	$stmt = execute();
	$stmt = fetch();
	$stmt->close();


	// Add payment info
	$stmt = $con->prepare("INSERT INTO PaymentInfo (AccountId, CardNumber, NameOnCard, ExpirationDate)
				VALUES (?, ?, ?, ?);");
	$stmt->bind_param("ssss", $accountId, $cardno, $cardname, $expdate);
	$stmt->execute();
	
	if ($stmt){
		echo "<p>Registration Successful</p>";
	} else {
		echo "<p>There was an error during registration</p>";
	}

	$stmt->close();
	$con->close();
	require "footer.php";
	?>
</div>
</body>
</html>

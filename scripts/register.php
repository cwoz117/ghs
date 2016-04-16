<!DOCTYPE html>
<head>
	<link rel="stylesheet" type="text/css" href="styles/ghs_style.css">
	<?php require 'ghslib.php';?>
	<title>TEMPLATE</title>
</head>
<body>
	<?php require "scripts/header.php";?>
<div class="content">
	<?php require "scripts/nav.php";?>


	
	<?php
		$con = dbConnect();
		$uname = condition($_POST['uname']);
		$password = condition($_POST['pass']);
		$email = condition($_POST['email']);
		$fname = condition($_POST['fname']);
		$middleinit = condition($_POST['mname']);
		$lname = condition($_POST['lname']);
		$bday = condition($_POST['bday']);
		$address = condition($_POST['address']);
		$phone = condition($_POST['phone']);
		
		$stmt = $con->prepare("INSERT INTO Users (Birthday, Address, FirstName,
							MiddleInitial, LastName, Username, Password, Email, phoneNumber)
							VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssssss", $bday, $address,$fname,$middleinit,$lname,$uname,$password,$email,$phone);




	?>



	<?php require "scripts/footer.php";?>
</div>
</body>
</html>
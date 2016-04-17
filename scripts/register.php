<?php
echo "
<!DOCTYPE html>
<head>
	<link rel="stylesheet" type="text/css" href="styles/ghs_style.css">
	<title>TEMPLATE</title>
</head>
<body>";
require "header.php";
echo "<div class="content">";
require "nav.php";
		require "ghslib.php";
		$con = dbConnect();

		$uname = condition($_POST['uname']);
		$password = condition($_POST['pass']);
		$email = condition($_POST['email']);
		$fname = condition($_POST['fname']);
		$middleinit = condition($_POST['mname']);
		$lname = condition($_POST['lname']);
		//$bday = condition($_POST['bday']);
		$address = condition($_POST['address']);
		$phone = condition($_POST['phone']);

		$stmt = $con->prepare("INSERT INTO Users (Address, FirstName, MiddleInitial, LastName, Username, Password, Email, phoneNumber)
				       VALUES (?, ?, ?, ?, ?, ?, ?, ?);");
		$stmt->bind_param("ssssssss", $address,$fname,$middleinit,$lname,$uname,$password,$email,$phone);
		if ($stmt){
			echo "query ok <br>";
		} else {
			die("Query error<br>";
		}

		$stmt->execute();

		if ($stmt){
			echo "Registration Successful";
		}else {
			echo "Error During Registration";
		}


		con->close();
require "footer.php";
echo "
</div>
</body>
</html>
";
?>

<?php
   session_start();
?>
<!DOCTYPE html>
<head>
	<link rel="stylesheet" type="text/css" href="../styles/ghs_style.css">
	<title>Login</title>
	<?php require 'ghslib.php';?>
</head>
<body>
	<?php require "header.php";?>
	<div class="content">
	<?php require "nav.php";?>

	<?php
		$dbCon = dbConnect();
		$query = 'SELECT Password FROM Users WHERE Username="' . $_POST['uname'] . '";';
		$result = $dbCon->query($query);
		$row = $result->fetch_assoc();
		if($row['Password'] == $_POST["pass"]){
			echo "<p>Logged In</p>";
			$_SESSION["uname"] = $_POST["uname"];
			$_SESSION["pass"] = $_POST["pass"];
		}else{
			echo "<p>Not Logged In</p>";
		}
	?>
	<?php require "footer.php";?>
</div>
</body>
</html>
<?php session_start ?>
<!DOCTYPE html>
<head>
	<link rel="stylesheet" type="text/css" href="styles/ghs_style.css">
	<title>TEMPLATE</title>
</head>
<body>
	<?php require "header.php";?>
<div class="content">
	<?php require "nav.php";?>

	<?php
	require "ghslib.php";
	echo "<h2>Welcome" . $_SESSION["uname"] . "!</h2>";
	echo "<table>";

	?>
	<?php require "footer.php";?>
</div>
</body>
</html>

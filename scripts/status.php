<?php session_start ?>
<!DOCTYPE html>
<head>
	<link rel="stylesheet" type="text/css" href="../styles/ghs_style.css">
	<title>TEMPLATE</title>
</head>
<body>
	<?php require "header.php";?>
<div class="content">
	<?php require "nav.php";?>

	<?php
	require "ghslib.php";
	$dbCon = dbConnect();
	$sql = "SELECT AccountId FROM Users WHERE Username=" . $_SESSION["uname"] . ";";
	$accountID = $dbCon->query($sql);
	echo "<h2>Welcome" . $_SESSION["uname"] . "!</h2>";
	$sql = "SELECT GameId, Price, IP, CPUallo, BANDallo, HDDallo, RAMallo FROM VirtualMachine WHERE accountId=" . $accountID . ";";
	$result = $dbCon->query($sql);
	while($row = $result->fetch_assoc()) {
		echo "<table>
			<tr>
				<th>Game</th>
				<th>Server IP</th>
				<th>CPU</th>
				<th>Bandwidth</th>
				<th>HDD Space</th>
				<th>RAM</th>
				<th>Price</th>
			</tr>";
		echo "<tr>
			<td>" . $row['GameId'] . "</td>";
		echo "<td>" . $row['IP'] . "</td>";
		echo "<td>" . $row['CPUallo'] . "</td>";
		echo "<td>" . $row['BANDallo'] . "</td>";
		echo "<td>" . $row['HDDallo'] . "</td>";
		echo "<td>" . $row['RAMallo'] . "</td>";
		echo "<td>" . $row['Price'] . "</td>";
		echo "</tr></table>"
	}

	?>
	<?php require "footer.php";?>
</div>
</body>
</html>

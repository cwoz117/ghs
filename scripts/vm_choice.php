<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Game Hosting Solutions!</title>
	<link rel="stylesheet" type="text/css" href="../styles/ghs_style.css">
</head>
<body>
<div class="content">
		<?php include("nav.php");?>
		<section>
		<form action="../scripts/payment.php" method="post">
			<label for="low" class="option"><fieldset><legend>Low</legend>
				<ul>
					<li>1GB RAM</li>
					<li>10GM HDD </li>
					<li>5Pl</li>
				</ul>
				<input type="radio" name="option" id="low" value="low" checked>
			</fieldset></label><br/>
			<label for="med" class="option"><fieldset><legend>Medium</legend>
				<ul>
					<li>1GB RAM</li>
					<li>10GM HDD </li>
					<li>5Pl</li>
				</ul>
				<input type="radio" id="med" name="option" value="med">
			</fieldset></label><br/>
			<label for="high" class="option"><fieldset><legend>High</legend>
				<ul>
					<li>1GB RAM</li>
					<li>10GM HDD </li>
					<li>5Pl</li>
				</ul>
				<input type="radio" id="high" name="option" value="high">
			</fieldset></label><br/>
			<input id="purch" type="submit" value="Buy">
		</form>
	</section>
<div class="content">
</body>
</html>

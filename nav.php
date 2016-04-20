<?php session_start(); ?>
<nav>
	<ul>
		<li><a href="index.html">Home</a></li>
		<li><a href="games.html">Games</a></li>
		<li><a href="admin.html">Debug</a></li>
		<?php
		if(!isset($_SESSION['uname'])){
			echo '<li style="float:right;margin:7px 16px 7px 16px;">
				<form action="login.php" method="post">
				Username/Password:
				<input type="text" name="uname">
				<input type="password" name="pword">
				<input type="submit" value="login">
				</form>
			</li>
			<li style="float:right;border-left:1px solid #0B3C5D;">
				<a href="register.html">Register</a>
			</li>';
		}else {
			echo '<li><a href="profile.html">Profile</a></li>';
			echo '<li><a href="status.html">VM Status</a></li>';
		
			echo '<li style="float:right;margin:14px 16px 0 16px;">' . $_SESSION['uname'] . '</li>';
			echo '<li style="float:right;margin:14px 16px 0 16px;">
				<form action="login.php" method="post">
				<input type="submit" name="logout" value="logout">
				</form></li>';
		}
		?>
	</ul>
</nav>

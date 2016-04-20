<?php
	session_start();
	require 'ghslib.php';

	// Get AccountID from their username.
	$con = dbConnect();
	$stmt = $con->prepare("SELECT AccountId FROM Users WHERE Username=?;");
	$stmt->bind_param("s", $_SESSION["uname"]);
	$stmt->bind_result($AccountId);
	$stmt->execute();
	$stmt->fetch();
	$stmt->close();

	// Hard code 1 computer, IP, and initial game.
	// TODO: Put into a function that determines these through load balancing.
	$ComputerId = 1;
	$GameId = 1;	// Sets to the first game, but is mutable.
	$IP = "1.1.1.1";// Again, should be set via loadbalancing w/ computer ID.
	$isRunning = 0;

	if(isset($_POST['isRunning'])) {
		$GameID = $_POST['GameID'];
		$isRunning = $_POST['isRunning'];
		$VMid = $_POST['VMid'];
		$sql = 'UPDATE VirtualMachine SET GameId="' . $GameID . '", isRunning="' . $isRunning . '" WHERE VirtualMachineId="' . $VMid . '";';
		$con->query($sql);
	} elseif(isset($_POST['deleteVM'])) {
		$VMid = $_POST['deleteVM'];
		$sql = 'DELETE FROM VirtualMachine WHERE VirtualMachineId="' . $VMid . '" AND AccountId="' . $AccountId . '";';
		$con->query($sql);
	}  else {
	// Set VM based on options.
	switch ($_POST["option"]) {
		case ("low"):
			$RAMallo = "1GB";
			$HDDallo = "100MB";
			$BANDallo = "5pl";
			$CPUallo = "10GHz";
			$price = "1.99";
			break;
		case ("med"):
			$RAMallo = "2GB";
			$HDDallo = "1GB";
			$BANDallo = "5pl";
			$CPUallo = "15GHz";
			$price = "2.99";
			break;
		default:
			$RAMallo = "4GB";
			$HDDallo = "5GB";
			$BANDallo = "10pl";
			$CPUallo = "20Ghz";
			$price = "4.99";
	}

	//Add a vm of requested type to a users VM-list.
	// ComputerId, AccountId, GameId are all NOT NULL.
	$stmt = $con->prepare("INSERT INTO VirtualMachine 
		(ComputerId, AccountId, GameId, Price, IP, CPUallo, BANDallo, HDDallo, RAMallo, isRunning) 
		VALUES (?,?,?,?,?,?,?,?,?,?);");
	$stmt->bind_param("iiissssssi", $ComputerId, $AccountId, $GameId, $Price, $IP, $CPUallo, 
					$BANDallo, $HDDallo, $RAMallo, $isRunning);
	$stmt->execute();
	$stmt->close();
	}
	$con->close();
	echo '<script>window.location.href= "status.html";</script>';

?>

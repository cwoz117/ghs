<?php
	require 'ghslib.php';
	$dbCon = dbConnect();
	$id=$_POST['ID'];
	//echo $id;
	if(isset($_POST['userInfo'])){
	$fname = condition($_POST['FirstName']);		
	$mInit = condition($_POST['mInit']);	
	$lname = condition($_POST['LastName']);
	$bday = condition($_POST['Birthday']);	
	$email = condition($_POST['Email']);	
	$address = condition($_POST['Address']);
	$pnumber = condition($_POST['pNumber']);
	$sql = 'UPDATE Users SET FirstName="'.$fname.'", MiddleInitial="'.$mInit.'", LastName="'.$lname.'", Birthday="'.$bday.'", Email="'.$email.'", Address="'.$address.'", phoneNumber="'.$pnumber.'" WHERE AccountId="'.$id.'";';
	$dbCon->query($sql);
	}
	elseif(isset($_POST['pword'])){
		$current = condition($_POST['current']);
		$new = condition($_POST['new']);
		$sql = 'UPDATE Users SET Password="'.$new.'" WHERE Password="'.$current.'" AND AccountId="'.$id.'";';
		$dbCon->query($sql);
	}
	elseif(isset($_POST['paymentInfo'])){
		$cardNumber = condition($_POST['cardNumber']);
		$nameOnCard = condition($_POST['nameOnCard']);
		$ed = $_POST['expirationDate'];		
		$sql = 'UPDATE PaymentInfo SET CardNumber="'.$cardNumber.'", NameOnCard="'.$nameOnCard.'", ExpirationDate="'.$ed.'" WHERE AccountId="'.$id.'";';
		$dbCon->query($sql);
	}
	echo '<script>window.location.href= "profile.html";</script>';
?>

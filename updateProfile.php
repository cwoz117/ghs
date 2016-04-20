<?php
	require 'ghslib.php';
	$dbCon = dbConnect();
	$id=$_POST['ID'];
	//echo $id;
	if(isset($_POST['userInfo'])){
	$fname = $_POST['FirstName'];		
	$mInit = $_POST['mInit'];	
	$lname = $_POST['LastName'];
	$bday = $_POST['Birthday'];	
	$email = $_POST['Email'];	
	$address = $_POST['Address'];
	$pnumber = $_POST['pNumber'];
	$sql = 'UPDATE Users SET FirstName="'.$fname.'", MiddleInitial="'.$mInit.'", LastName="'.$lname.'", Birthday="'.$bday.'", Email="'.$email.'", Address="'.$address.'", phoneNumber="'.$pnumber.'" WHERE AccountId="'.$id.'";';
	$dbCon->query($sql);
	}
	elseif(isset($_POST['pword'])){
		$current = $_POST['current'];
		$new = $_POST['new'];
		$sql = 'UPDATE Users SET Password="'.$new.'" WHERE Password="'.$current.'" AND AccountId="'.$id.'";';
		$dbCon->query($sql);
	}
	elseif(isset($_POST['paymentInfo'])){
		$cardNumber = $_POST['cardNumber'];
		$nameOnCard = $_POST['nameOnCard'];
		$ed = $_POST['expirationDate'];		
		$sql = 'UPDATE PaymentInfo SET CardNumber="'.$cardNumber.'", NameOnCard="'.$nameOnCard.'", ExpirationDate="'.$ed.'" WHERE AccountId="'.$id.'";';
		$dbCon->query($sql);
	}
	echo '<script>window.location.href= "profile.html";</script>';
?>

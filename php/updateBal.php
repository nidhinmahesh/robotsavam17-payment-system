<?php
$stall="RegistraionDesk"; //TODO Session Variable for registration counter login
$phone=$_POST['userPhone'];
$amount=$_POST['amount'];
$user_id=$_POST['userid'];

		
include('dbconnect.php');

	/* check connection */
	if (mysqli_connect_errno()) {
	    printf("Connect failed: %s\n", mysqli_connect_error());
	    exit();
	}
	
	$query = "UPDATE users SET balance = balance+$amount where user_phone=$phone and user_id=$user_id";
	$mysqli->query($query);
	$result=$mysqli->affected_rows;
	if($result) { 
		$message = "Success";
		$query="INSERT INTO transactions (user_id, stall_id, amount) VALUES
	('$user_id', '$stall', '$amount')";	
		$mysqli->query($query);
		unset($_POST);
	} else {
		$message = "Failed";	
	}
	
	echo $message;

?>
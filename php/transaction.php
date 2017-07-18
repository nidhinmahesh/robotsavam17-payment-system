<?php
$stall="storeidhere"; //TODO Session Variable for stall login
$phone=$_POST['userPhone'];
$amount=$_POST['amount'];
$user_id=$_POST['userid'];

		
include('dbconnect.php');

	/* check connection */
	if (mysqli_connect_errno()) {
	    printf("Connect failed: %s\n", mysqli_connect_error());
	    exit();
	}
	$status=$mysqli->query("select balance from users where user_phone='".$phone."'");
	$status=$status->fetch_assoc();
	$balance_new=$status['balance']-$amount;
	if($balance_new>=0){
		$query = "UPDATE users SET balance = balance-$amount where user_phone=$phone and user_id=$user_id";
		$mysqli->query($query);
		$result=$mysqli->affected_rows;
		if($result) { 
		// 	$query = "UPDATE stalls SET balance = balance+$amount where stall_id=$stall";
		// $mysqli->query($query);
			$message = "Success";
			$query="INSERT INTO transactions (user_id, stall_id, amount) VALUES
		('$user_id', '$stall', '-$amount')";	
			$mysqli->query($query);
			unset($_POST);
		} else {
			$message = "Failed";	
		}
	}
	else
		$message = "Fund";
	
	echo $message;

?>
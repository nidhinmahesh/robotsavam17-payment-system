<?php
$stallId="stall"; //TODO Session Variable for stall login
$userPhone=$_POST['userPhone'];
$item=$_POST['item'];
$amount=$_POST['amount'];
$userId=$_POST['userId'];

		
include('dbconnect.php');

	/* check connection */
	if (mysqli_connect_errno()) {
	    printf("Connect failed: %s\n", mysqli_connect_error());
	    exit();
	}
	$status=$mysqli->query("select balance from users where userPhone='".$userPhone."'");
	$status=$status->fetch_assoc();
	$balance_new=$status['balance']-$amount;
	if($balance_new>=0){//if balance is available
		$query = "UPDATE users SET balance = $balance_new where userPhone=$userPhone and userId=$userId";
		$mysqli->query($query);
		$result=$mysqli->affected_rows;
		if($result==1) { //if update users is successful
			$query="INSERT INTO transactions (userId, stallId,item, amount) VALUES ('$userId','$stallId','$item','-$amount')";	
			$mysqli->query($query);
			if(!$mysqli->error)
				$result = 2;//insert transaction success
			unset($_POST);
		} 
	}
	else
		$result = -1;//insufficient balance
	
	echo $result;

?>
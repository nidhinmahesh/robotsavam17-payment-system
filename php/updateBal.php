<?php
$stallId="RegistraionDesk"; //TODO Session Variable for registration counter login
$item="UPD";
$userPhone=$_POST['userPhone'];
$amount=$_POST['amount'];
$userId=$_POST['userId'];

		
include('dbconnect.php');

	/* check connection */
	if (mysqli_connect_errno()) {
	    printf("Connect failed: %s\n", mysqli_connect_error());
	    exit();
	}
	
	$query = "UPDATE users SET balance = balance+$amount where userPhone=$userPhone and userId=$userId";
	$mysqli->query($query);
	$result=$mysqli->affected_rows;//update success check
	if($result==1) { //if update user is successful
		$query="INSERT INTO transactions (userId, stallId,item, amount) VALUES
	('$userId', '$stallId','$item', '$amount')";	
		$mysqli->query($query);
			if(!$mysqli->error)
				$result = 2;//insert transaction success
		unset($_POST);
	}
	 else 
		$result = 0;//update failed
	
	
	echo $result;

?>
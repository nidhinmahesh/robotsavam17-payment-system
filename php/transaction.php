<?php
$stall="RegistrationDesk"; //TODO Session Variable for registration counter login
$phone=$_POST['phone'];
$amount=$_POST['amount'];

		
	 $host = "localhost";
	 $user = "root";
	 $password = "";
	 $database = "robocash";
	
	$mysqli = new mysqli($host,$user,$password,$database);

	/* check connection */
	if (mysqli_connect_errno()) {
	    printf("Connect failed: %s\n", mysqli_connect_error());
	    exit();
	}
	$status=$mysqli->query("select balance from users where user_phone='".$phone."'");
	$status=$status->fetch_assoc();
	$balance_new=$status['balance']-$amount;
	if($balance_new>=0){
		$query = "UPDATE users SET balance = balance-$amount where user_phone=$phone";
		$mysqli->query($query);
		$result=$mysqli->affected_rows;
		if($result) { 
			$message = "Success";
			$query="INSERT INTO transactions (userPhone, stall_id, amount) VALUES
		('$phone', '$stall', '-$amount')";	
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
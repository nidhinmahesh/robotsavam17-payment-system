<?php
$stallId="RegistrationDesk"; //TODO Session Variable for registration counter login
$item="REG";
$userId=$_POST['userId'];
$userPhone=$_POST['userPhone'];
$amount=$_POST['amount'];
$userName=$_POST['userName'];

include('dbconnect.php');

	/* check connection */
	if (mysqli_connect_errno()) {
	    printf("Connect failed: %s\n", mysqli_connect_error());
	    exit();
	}

		$query = "INSERT INTO users (userId, userName, userPhone, balance) VALUES ('$userId','$userName','$userPhone','$amount')";
		$result=$mysqli->query($query);
		if($result) {
			$message = 1;//insert user success
			$query="INSERT INTO transactions (userId, stallId, item, amount) VALUES
		('$userId', '$stallId', '$item', '$amount')";	
			$mysqli->query($query);
			if(!$mysqli->error)
				$message = 2;//insert transaction success
			unset($_POST);
		} else {
			$message = 0;//insert user failed	
		}
	
	echo $message;



?>
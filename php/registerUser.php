<?php
$stall_id="RegistrationDesk"; //TODO Session Variable for registration counter login
$user_id=$_POST['userid'];
$user_phone=$_POST['userphone'];
$amount=$_POST['amount'];
$user_name=$_POST['name'];

include('dbconnect.php');

	/* check connection */
	if (mysqli_connect_errno()) {
	    printf("Connect failed: %s\n", mysqli_connect_error());
	    exit();
	}

		$query = "INSERT INTO users (user_id, user_name, user_phone, balance) VALUES ('$user_id','$user_name','$user_phone','$amount')";
		$result=$mysqli->query($query);
		if($result) {
			$message = "Success";
			$query="INSERT INTO transactions (user_id, stall_id, amount) VALUES
		('$user_id', '$stall_id', '$amount')";	
			$mysqli->query($query);
			unset($_POST);
		} else {
			$message = "User ID exists";	
		}
	
	echo $message;



?>
<?php
$stall="RegistrationDesk"; //TODO Session Variable for registration counter login
$phone=$_POST['phone'];
$amount=$_POST['amount'];
$name=$_POST['name'];

		
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

		$query = "INSERT INTO users (user_name, user_phone, balance) VALUES ('$name','$phone','$amount')";
		$mysqli->query($query);
		$result=$mysqli->affected_rows;
		if($result) {
			$message = "Success";
			$query="INSERT INTO transactions (userPhone, stall_id, amount) VALUES
		('$phone', '$stall', '$amount')";	
			$mysqli->query($query);
			unset($_POST);
		} else {
			$message = "Failed";	
		}
	
	echo $message;

?>
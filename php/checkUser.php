<?php
$user_id=$_POST['userid'];

		
include('dbconnect.php');

	/* check connection */
	if (mysqli_connect_errno()) {
	    printf("Connect failed: %s\n", mysqli_connect_error());
	    exit();
	}

		$query = "SELECT * from users WHERE user_id='$user_id'";
		$result=$mysqli->query($query);
		if($result) {
			$details=$result->fetch_array();
			echo json_encode($details);
		} else {
			echo "User ID does not exists";	
		}


?>